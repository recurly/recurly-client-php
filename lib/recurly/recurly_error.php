<?php

namespace Recurly;

class RecurlyError extends \Error
{
    use RecurlyTraits;

    private $_response;

    /**
     * Constructor
     * 
     * @param object            $json     The JSON error object from the API response
     * @param \Recurly\Response $response The \Recurly\Response object
     */
    public function __construct(object $json, \Recurly\Response $response)
    {
        parent::__construct($json->message, $response->getStatusCode());
        $this->_response = $response;
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
     * Class method to build a \Recurly\RecurlyError from a JSON error object
     * 
     * @param object            $json     The JSON object from the API response
     * @param \Recurly\Response $response The \Recurly\Response object
     * 
     * @return \Recurly\RecurlyError
     */
    public static function fromJson(object $json, \Recurly\Response $response): \Recurly\RecurlyError // phpcs:ignore Generic.Files.LineLength.TooLong
    {
        // ResponseError
        // ClientError < RE
        //  ValidationError < CE
        //    3DSError < VE
        // ServerError < RE
        $klass = static::titleize($json->error->type, '\\Recurly\\Errors\\');
        if (!class_exists($klass)) {
            // If the error class isn't valid, use the generic \Recurly\RecurlyError
            // class instead. The errors must flow
            $klass = static::class;
        }
        return new $klass($json->error, $response);
    }

}