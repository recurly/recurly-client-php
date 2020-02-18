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
    public function __construct(string $message, \Recurly\Resources\ErrorMayHaveTransaction $api_error = null) // phpcs:ignore Generic.Files.LineLength.TooLong
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
    public static function fromResponse(\Recurly\Response $response): \Recurly\RecurlyError // phpcs:ignore Generic.Files.LineLength.TooLong
    {
        if ($response->getStatusCode() >= 400 && $response->getStatusCode() < 500) {
            $default = \Recurly\Errors\ClientError::class;
        } elseif ($response->getStatusCode() >= 500) {
            $default = \Recurly\Errors\ServerError::class;
        } else {
            // The errors must flow
            $default = \Recurly\RecurlyError::class;
        }

        if ($response->getContentType() == 'application/json') {
            $json = $response->getJsonResponse();
            if (isset($json->error)) {
                $klass = static::titleize($json->error->type, '\\Recurly\\Errors\\');
                if (!class_exists($klass)) {
                    $klass = $default;
                }
                $error = $json->error;
                $error->object = 'error_may_have_transaction';
                $api_error = \Recurly\Resources\ErrorMayHaveTransaction::fromJson($error, $response);
                //$api_error = \Recurly\Resources\ErrorMayHaveTransaction::fromResponse($response, $error);
                return new $klass($json->error->message, $api_error);
            }
        } else {
            $error_type = static::errorFromStatus($response->getStatusCode());
            $klass = static::titleize($error_type, '\\Recurly\\Errors\\');
            if (class_exists($klass)) {
                return new $klass('An unexpected error has occurred');
            }
        }
        return new $default('An unexpected error has occurred');

    }

}