<?php

namespace Recurly;

abstract class RecurlyResource
{
    use RecurlyTraits;

    private $_response;
    protected static $array_hints = [];

    /**
     * Constructor
     */
    public final function __construct()
    {
    }

    /**
     * Getter for the Recurly HTTP Response
     * 
     * @return \Recurly\Response The Recurly HTTP Response
     */
    public function getResponse(): \Recurly\Response
    {
        return $this->_response;
    }

    /**
     * Setter for the Recurly HTTP Response
     * 
     * @param \Recurly\Response $response The Recurly HTTP Response
     * 
     * @return void
     */
    protected function setResponse(\Recurly\Response $response): void
    {
        $this->_response = $response;
    }

    /**
     * Guard against setting invalid properties
     *
     * @param string $key   The parameter name that is being set
     * @param $value The parameter value that is being set
     * 
     * @return             void
     * @codeCoverageIgnore
     */
    public function __set(string $key, $value): void
    {
        $klass = get_class($this);
        // TODO: This should only happen in strict mode?
        trigger_error("Cannot set {$key} on {$klass}", E_USER_ERROR);
    }

    /**
     * Returns a \Recurly\EmptyResource for API requests that do not have a response
     * body.
     * 
     * @param \Recurly\Response $response (optional) The Recurly HTTP Response
     * 
     * @return \Recurly\EmptyResource
     */
    public static function fromEmpty(\Recurly\Response $response): \Recurly\EmptyResource
    {
        $klass = new \Recurly\EmptyResource();

        $klass->setResponse($response);
        return $klass;
    }

    /**
     * Converts a Recurly response object into a \Recurly\RecurlyResource.
     * 
     * @param \Recurly\Response $response The Recurly HTTP Response
     * @param object            $json     (optional) JSON payload to use instead of
     *                                    the $response's. Primarily used for errors
     * 
     * @return \Recurly\RecurlyResource An instance of a Recurly Resource
     */
    public static function fromResponse(\Recurly\Response $response, object $json = null): \Recurly\RecurlyResource
    {
        $json = is_null($json) ? $response->getJsonResponse() : $json;
        $klass_name = static::resourceClass($json->object);
        $klass = $klass_name::cast($json);

        $klass->setResponse($response);
        return $klass;
    }

    /**
     * Recursively converts a response object into a \Recurly\RecurlyResource.
     * 
     * @param object $data PHP Object containing the decoded JSON
     * 
     * @return \Recurly\RecurlyResource An instance of a Recurly Resource
     */
    public static function cast(object $data): \Recurly\RecurlyResource
    {
        $klass = new static();
        foreach ($data as $key => $value) {
            if (empty($value)) {
                continue;
            }

            $setter = static::titleize($key, 'set');
            if (method_exists(static::class, $setter)) {
                if (is_array($value)) {
                    $klass->$setter(
                        array_map(
                            function ($item) use ($setter) {
                                if (property_exists($item, 'object')) {
                                    $item_class = static::resourceClass($item->object);
                                } else {
                                    // TODO: Ensure that there is a hintArrayType method
                                    $item_class = static::hintArrayType($setter);
                                    if (!preg_match('/^Recurly/', $item_class)) {
                                        return $item;
                                    }
                                }
                                return $item_class::cast($item);
                            }, $value
                        )
                    );
                } elseif (is_object($value)) {
                    $setter_class = static::setterParamClass($setter);
                    if (preg_match('/^Recurly/', $setter_class)) {
                        $param = new $setter_class();
                        $klass->$setter($param::cast($value));
                    } else {
                        $klass->$setter($value);
                    }
                } else {
                    $klass->$setter($value);
                }
            } elseif ($key == 'object') {
                continue;
            } elseif (\Recurly\STRICT_MODE) {
                // @codeCoverageIgnoreStart
                $klass_name = static::class;
                trigger_error("[STRICT_MODE] $klass_name encountered json attribute $key but it's unknown to it's schema", E_USER_ERROR);
                // @codeCoverageIgnoreEnd
            }
        }
        return $klass;
    }

    /**
     * Uses the Reflection API to determine what \Recurly\RecurlyResource is the
     * expected parameter for the given method.
     * 
     * @param string $method The name of the setter method to find the type hint for
     * 
     * @return string The \Recurly\RecurlyResource that the setter method expects
     */
    protected static function setterParamClass(string $method)
    {
        $class = new \ReflectionClass(get_called_class());
        $method = $class->getMethod($method);
        $parameters = $method->getParameters();
        return $parameters[0]->getType()->getName();
    }

    /**
     * Converts a binary response into a Recurly BinaryFile
     * 
     * @param string            $data     The binary file data
     * @param \Recurly\Response $response (optional) The Recurly HTTP Response
     * 
     * @return \Recurly\Resources\BinaryFile An instance of a Recurly BinaryFile
     */
    public static function fromBinary(string $data, \Recurly\Response $response): \Recurly\Resources\BinaryFile
    {
        $klass = new \Recurly\Resources\BinaryFile();
        $klass->setData($data);
        $klass->setResponse($response);
        return $klass;
    }

    /**
     * Converts a string into a representation of a Recurly Resource
     *
     * @param string $type A string to convert to a Recurly Resource
     *
     * @return string The string representation of a Recurly Resource
     */
    protected static function resourceClass(string $type): string
    {
        if ($type == 'list') {
            return "\\Recurly\\Page";
        }

        $klass = static::titleize($type, "\\Recurly\\Resources\\");
        if (!class_exists($klass)) {
            // @codeCoverageIgnoreStart
            if (\Recurly\STRICT_MODE) {
                trigger_error("[STRICT_MODE] Could not find the Recurly class for key {$type}", E_USER_ERROR);
            }
            // @codeCoverageIgnoreEnd
        }
        return $klass;
    }

    /**
     * The hintArrayType method will provide type hinting for setter methods that
     * have array parameters.
     * 
     * @param string $key The property to get teh type hint for.
     * 
     * @return string The class name of the expected array type.
     */
    protected static function hintArrayType($key): string
    {
        return static::$array_hints[$key];
    }

    /**
     * Override of the magic method __debugInfo that will only return the relevant
     * attributes of the \Recurly\RecurlyResource
     * 
     * @return             array
     * @codeCoverageIgnore
     */
    public function __debugInfo(): array
    {
        $class = new \ReflectionClass(get_called_class());
        return array_reduce(
            $class->getProperties(),
            function ($carry, $property) {
                if ($property->name == 'array_hints') {
                    return $carry;
                }
                $private = $property->isPrivate();
                if ($private) {
                    $property->setAccessible(true);
                }
                $display_name = $private ? substr($property->name, 1) : $property->name;
                $carry[$display_name] = $property->getValue($this);
                if ($private) {
                    $property->setAccessible(false);
                }
                return $carry;
            },
            []
        );
    }
}
