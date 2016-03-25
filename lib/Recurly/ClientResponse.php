<?php

namespace Recurly;

use Recurly\Errors\FieldError;
use Recurly\Errors\RequestError;
use Recurly\Errors\ServerError;
use Recurly\Errors\ApiLimitError;
use Recurly\Errors\NotFoundError;
use Recurly\Errors\TransactionError;
use Recurly\Errors\UnauthorizedError;
use Recurly\Errors\Error;
use Recurly\Errors\ConnectionError;
use Recurly\Errors\ValidationError;

class ClientResponse
{
    public $statusCode;
    public $headers;
    public $body;

    public function __construct($statusCode, $headers, $body)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function assertSuccessResponse($object)
    {
        if ($this->statusCode == 422) {
            if ($object instanceof FieldError) {
                throw new ValidationError('Validation error', null, array($object));
            } else {
                if ($object instanceof ErrorList) {
                    throw new ValidationError('Validation error', null, $object);
                } else {
                    if (is_array($object) && count($object) == 3) {
                        $trans_error = $object[0];
                        $transaction = $object[2];
                        if ($trans_error instanceof TransactionError && $transaction instanceof Transaction) {
                            throw new ValidationError($trans_error->customer_message, $transaction,
                                array($trans_error));
                        }
                    } else {
                        throw new ValidationError('Validation error', $object, $object->getErrors());
                    }
                }
            }
        }
    }

    public function assertValidResponse()
    {
        // Successful response code
        if ($this->statusCode >= 200 && $this->statusCode < 400) {
            return;
        }

        // Do not fail here if the response is not valid XML
        $error = @$this->parseErrorXml($this->body);

        switch ($this->statusCode) {
            case 0:
                throw new ConnectionError('An error occurred while connecting to Recurly.');
            case 400:
                $message = (is_null($error) ? 'Bad API Request' : $error->description);
                throw new Error($message);
            case 401:
                throw new UnauthorizedError('Your API Key is not authorized to connect to Recurly.');
            case 403:
                throw new UnauthorizedError('Please use an API key to connect to Recurly.');
            case 404:
                $message = (is_null($error) ? 'Object not found' : $error->description);
                throw new NotFoundError($message);
            case 422:
                // Handled in assertSuccessResponse()
                return;
            case 429:
                throw new ApiLimitError('You have made too many API requests in the last 5 minutes. Future API requests may be ignored until your rate limit resets in 5 minutes. Please visit: https://dev.recurly.com/docs/rate-limits');
            case 500:
                $message = (is_null($error) ? 'An error occurred while connecting to Recurly' :
                    'An error occurred while connecting to Recurly: '.$error->description);
                throw new ServerError($message);
            case 502:
            case 503:
            case 504:
                throw new ConnectionError('An error occurred while connecting to Recurly.');
        }

        // Catch future 400-499 errors as request errors
        if ($this->statusCode >= 400 && $this->statusCode < 500) {
            throw new RequestError("Invalid request, status code: {$this->statusCode}");
        }

        // Catch future 500-599 errors as server errors
        if ($this->statusCode >= 500 && $this->statusCode < 600) {
            $message = (is_null($error) ? 'An error occurred while connecting to Recurly' :
                'An error occurred while connecting to Recurly: '.$error->description);
            throw new ServerError($message);
        }
    }

    private function parseErrorXml($xml)
    {
        $dom = new \DOMDocument();
        if (empty($xml) || !$dom->loadXML($xml)) {
            return;
        }

        $rootNode = $dom->documentElement;
        if ($rootNode->nodeName == 'error') {
            return self::parseErrorNode($rootNode);
        } else {
            return;
        }
    }

    private static function parseErrorNode($node)
    {
        $node = $node->firstChild;
        $error = new FieldError();

        while ($node) {
            switch ($node->nodeName) {
                case 'symbol':
                    $error->symbol = $node->nodeValue;
                    break;
                case 'description':
                    $error->description = $node->nodeValue;
                    break;
            }
            $node = $node->nextSibling;
        }

        return $error;
    }
}
