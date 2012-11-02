<?php

namespace Recurly;

/*
 * Helper class for signing Recurly.js requests
 */
use Recurly\Errors\ConfigurationError;

class Js
{
    /**
     * Recurly.js Private Key.
     */
    public static $privateKey;

    private $data;

    public function __construct($data)
    {
        if (!is_array($data)) {
            throw new \Exception('js expects an array');
        }

        $this->data = $data;
    }

    // Create a signature with the protected data
    public function get_signature()
    {
        $this->data['timestamp'] = $this->utc_timestamp();

        if (!in_array('nonce', $this->data)) {
            $this->data['nonce'] = $this->get_nonce();
        }

        ksort($this->data);
        $queryString = http_build_query($this->data, null, '&');

        return self::_hash($queryString).'|'.$queryString;
    }

    // Convenience function providing parity between this and the other libraries.
    // get_signature() is implemented as a non-static method for ease of testing.
    //
    // TODO - Eliminate $type arg in favor of using static keyword for stubbing
    // if we ever drop PHP < 5.3.
    public static function sign($data, $type = 'js')
    {
        $rjs = new $type($data);

        return $rjs->get_signature();
    }

    // Lookup the result of a Recurly.js operation
    public static function fetch($token, $client = null)
    {
        $uri = Client::PATH_RECURLY_JS_RESULT.'/'.rawurlencode($token);

        return Base::_get($uri, $client);
    }

    // Hash a message using the client's private key
    public static function _hash($message)
    {
        if (!isset(self::$privateKey) || strlen(self::$privateKey) != 32) {
            throw new ConfigurationError('Recurly.js private key is not set. The private key must be 32 characters.');
        }

        return hash_hmac('sha1', $message, self::$privateKey);
    }

    // In its own function so it can be stubbed for testing
    protected function utc_timestamp()
    {
        return time();
    }

    // In its own function so it can be stubbed for testing
    protected function get_nonce()
    {
        return uniqid();
    }
}
