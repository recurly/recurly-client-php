<?php

namespace Recurly;

trait RecurlyTraits
{
    /**
     * Generates User-Agent for API requests
     * 
     * @return string Recurly client User-Agent string
     */
    protected static function getUserAgent(): string
    {
        $php_version = phpversion();
        return "Recurly/" . \Recurly\Version::CURRENT . "; php " . $php_version;
    }

    /**
     * Base64 encodes the API key
     * 
     * @param string $key The API key to encode
     * 
     * @return string base64 encoded API key
     */
    protected static function encodeApiKey(string $key): string
    {
        return base64_encode($key);
    }

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
}
