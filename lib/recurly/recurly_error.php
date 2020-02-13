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
    public function __construct(string $message, \Recurly\Resources\ErrorMayHaveTransaction $api_error) // phpcs:ignore Generic.Files.LineLength.TooLong
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
     * Class method to build a \Recurly\RecurlyError from a JSON error object
     * 
     * @param object            $json     The JSON object from the API response
     * @param \Recurly\Response $response The \Recurly\Response object
     * 
     * @return \Recurly\RecurlyError
     */
    public static function fromJson(object $json, \Recurly\Response $response): \Recurly\RecurlyError // phpcs:ignore Generic.Files.LineLength.TooLong
    {
        $klass = static::titleize($json->error->type, '\\Recurly\\Errors\\');
        if (!class_exists($klass)) {
            // If the error class isn't valid, use the generic \Recurly\RecurlyError
            // class instead. The errors must flow
            $klass = static::class;
        }
        echo "Error?: " . static::errorFromStatus($response->getStatusCode()) . PHP_EOL;
        $error = $json->error;
        $error->object = 'error_may_have_transaction';
        $api_error = \Recurly\Resources\ErrorMayHaveTransaction::fromJson($error, $response);
        return new $klass($json->error->message, $api_error);
    }

}