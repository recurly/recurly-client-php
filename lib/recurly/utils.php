<?php

namespace Recurly;

class Utils
{
    private static $_client_version = \Recurly\Version::CURRENT;

    public static function getUserAgent(): string
    {
        $php_version = phpversion();
        return "Recurly/" . self::$_client_version . "; php " . $php_version;
    }

    public static function encodeApiKey($key): string
    {
        return base64_encode($key);
    }
}