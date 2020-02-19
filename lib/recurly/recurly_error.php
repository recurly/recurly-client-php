<?php

namespace Recurly;

class RecurlyError extends \Error
{
    use RecurlyTraits;
    use ErrorTraits;

    private $_api_error;

    /**
     * Constructor
     * 
     * @param string                                     $message   The error message from the API response
     * @param \Recurly\Resources\ErrorMayHaveTransaction $api_error The error from the API response
     */
    public function __construct(string $message, \Recurly\Resources\ErrorMayHaveTransaction $api_error = null)
    {
        parent::__construct($message);
        $this->_api_error = $api_error;
    }

    /**
     * Getter for the Recurly API Error
     * 
     * @return \Recurly\Resources\ErrorMayHaveTransaction
     */
    public function getApiError(): \Recurly\Resources\ErrorMayHaveTransaction
    {
        return $this->_api_error;
    }


    /**
     * Class method to build a \Recurly\RecurlyError from a Recurly response.
     * 
     * @param \Recurly\Response $response The \Recurly\Response object
     * 
     * @return \Recurly\RecurlyError
     */
    public static function fromResponse(\Recurly\Response $response): \Recurly\RecurlyError
    {

        if ($response->getContentType() == 'application/json') {
            $json = $response->getJsonResponse();
            if (isset($json->error)) {
                $error = $json->error;
                $klass = static::titleize($error->type, '\\Recurly\\Errors\\');
                if (!class_exists($klass)) {
                    $klass = static::_defaultErrorType($response);
                }
                $error->object = 'error_may_have_transaction';
                $api_error = \Recurly\Resources\ErrorMayHaveTransaction::fromResponse($response, $error);
                return new $klass($error->message, $api_error);
            }
        } else {
            $error_type = static::errorFromStatus($response->getStatusCode());
            $klass = static::titleize($error_type, '\\Recurly\\Errors\\');
            if (class_exists($klass)) {
                return new $klass('An unexpected error has occurred');
            }
        }
        $klass = static::_defaultErrorType($response);
        return new $klass('An unexpected error has occurred');

    }

    /**
     * Inspects the $response's HTTP status code and determines the default error
     * type to be used if a more suitable class is not found.
     * 
     * @param \Recurly\Response $response The \Recurly\Response object
     * 
     * @return string Default error class name
     */
    private static function _defaultErrorType(\Recurly\Response $response): string
    {
        if ($response->getStatusCode() >= 400 && $response->getStatusCode() < 500) {
            return \Recurly\Errors\ClientError::class;
        } elseif ($response->getStatusCode() >= 500) {
            return \Recurly\Errors\ServerError::class;
        } else {
            // The errors must flow
            return \Recurly\RecurlyError::class;
        }
    }

}