<?php

namespace Recurly;

trait RecurlyTraits
{

    /**
     * Capitalizes all the words in the $input.
     *
     * @param string $input  The string to titleize
     * @param string $prefix (optional) Prefix to add to the beginning of the
     *                       titleized string. The prefix will not be titleized.
     * 
     * @return string The titleized $input wtih the prepended $prefix
     */
    protected static function titleize(string $input, string $prefix = ''): string
    {
        return array_reduce(
            explode('_', $input),
            function ($name, $part) {
                return $name.ucfirst($part);
            },
            $prefix
        );
    }

    /**
     * Converts a string into a representation of a Recurly Resource
     *
     * @param string $type A string to convert to a Recurly Resource
     *
     * @return string The string representation of a Recurly Resource
     */
    protected static function resourceClass(string $type, string $namespace): string
    {
        if ($type == 'list') {
            return "\\Recurly\\Page";
        }

        $klass = static::titleize($type, $namespace);
        if (!class_exists($klass)) {
            // phpcs:ignore Generic.Files.LineLength.TooLong
            if (\Recurly\STRICT_MODE) {
                trigger_error("Could not find the Recurly class for key {$type}", E_USER_ERROR);
            }
        }
        return $klass;
    }

}