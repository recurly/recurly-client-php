<?php
/**
 * This file is automatically created by Recurly's OpenAPI generation process
 * and thus any edits you make by hand will be lost. If you wish to make a
 * change to this file, please create a Github issue explaining the changes you
 * need and we will usher them to the appropriate places.
 */
namespace Recurly;

trait ErrorTraits
{

    /**
     * Returns an error type for a given $status_code or an empty string.
     * 
     * @param int $status_code A HTTP status code
     * 
     * @return string A key that can be used to determine an error class
     */
    protected static function errorFromStatus(int $status_code): string
    {
        $error_map = array(
            500 => 'internal_server_error',
            502 => 'bad_gateway',
            503 => 'service_unavailable',
            304 => 'not_modified',
            400 => 'bad_request',
            401 => 'unauthorized',
            402 => 'payment_required',
            403 => 'forbidden',
            404 => 'not_found',
            406 => 'not_acceptable',
            412 => 'precondition_failed',
            422 => 'unprocessable_entity',
            429 => 'too_many_requests',
        );

        if (array_key_exists($status_code, $error_map)) {
            return $error_map[$status_code];
        }
        return '';
    }
}
