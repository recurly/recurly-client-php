<?php

class Recurly_ClientResponse
{
  var $statusCode;
  var $headers;
  var $body;

  function __construct($statusCode, $headers, $body) {
    $this->statusCode = $statusCode;
    $this->headers = $headers;
    $this->body = $body;
  }

  public function assertSuccessResponse($object)
  {
    if ($this->statusCode == 422)
    {
      if ($object instanceof Recurly_FieldError)
        throw new Recurly_ValidationError('Validation error', null, array($object));
      else if ($object instanceof Recurly_ErrorList)
        throw new Recurly_ValidationError('Validation error', null, $object);
      else if (is_array($object) && count($object) == 3) {
        $trans_error = $object[0];
        $transaction = $object[2];
        if ($trans_error instanceof Recurly_TransactionError && $transaction instanceof Recurly_Transaction)
          throw new Recurly_ValidationError($trans_error->customer_message, $transaction, array($trans_error));
      }
      else {
        // Here we are making sure that this isn't a ValidationError in the shape of a FieldError
        // If it is, we will reshape it into a ValidationError
        $error = @$this->parseErrorXml($this->body);
        if (isset($error)) {
          throw new Recurly_ValidationError('Validation error', $object, array($error));
        }
        throw new Recurly_ValidationError('Validation error', $object, $object->getErrors());
      }

    }
  }

  public function assertValidResponse()
  {
    if (!empty($this->headers['Recurly-Deprecated'])) {
      error_log("WARNING: API version {$this->headers['X-Api-Version']} is deprecated and will only be available until {$this->headers['Recurly-Sunset-Date']}. Please upgrade the Recurly PHP client.");
    }

    // Successful response code
    if ($this->statusCode >= 200 && $this->statusCode < 300)
      return;

    // Do not fail here if the response is not valid XML
    $error = @$this->parseErrorXml($this->body);

    switch ($this->statusCode) {
      case 0:
        throw new Recurly_ConnectionError('An error occurred while connecting to Recurly.');
      case 301:
      case 302:
        throw new Recurly_Error('Unexpected redirection to ' . $this->headers['Location'] . ', we where expecting a response.');
      case 400:
        $message = (is_null($error) ? 'Bad API Request' : $error->description);
        $recurlyCode = (is_null($error) ? null : $error->symbol);
        throw new Recurly_Error($message, 0, null, $recurlyCode);
      case 401:
        throw new Recurly_UnauthorizedError('Your API Key is not authorized to connect to Recurly.');
      case 403:
        throw new Recurly_UnauthorizedError('Please use an API key to connect to Recurly.');
      case 404:
        $message = (is_null($error) ? 'Object not found' : $error->description);
        throw new Recurly_NotFoundError($message);
      case 422:
        // Handled in assertSuccessResponse()
        return;
      case 429:
        throw new Recurly_ApiRateLimitError('You have made too many API requests in the last 5 minutes. Future API requests may be ignored until your rate limit resets in 5 minutes. Please visit: https://dev.recurly.com/docs/rate-limits');
      case 500:
        $message = (is_null($error) ? 'An error occurred while connecting to Recurly' :
                   'An error occurred while connecting to Recurly: ' . $error->description);
        throw new Recurly_ServerError($message);
      case 502:
      case 503:
      case 504:
        throw new Recurly_ConnectionError('An error occurred while connecting to Recurly.');
    }

    // Catch future 400-499 errors as request errors
    if ($this->statusCode >= 400 && $this->statusCode < 500)
      throw new Recurly_RequestError("Invalid request, status code: {$this->statusCode}");

    // Catch future 500-599 errors as server errors
    if ($this->statusCode >= 500 && $this->statusCode < 600) {
      $message = (is_null($error) ? 'An error occurred while connecting to Recurly' :
                 'An error occurred while connecting to Recurly: ' . $error->description);
      throw new Recurly_ServerError($message);
    }
  }

  private function parseErrorXml($xml) {
    $dom = new DOMDocument();
    if (empty($xml) || !$dom->loadXML($xml)) return null;

    $rootNode = $dom->documentElement;
    if ($rootNode->nodeName == 'error')
      return Recurly_ClientResponse::parseErrorNode($rootNode);
    else
      return null;
  }

  private static function parseErrorNode($node)
  {
    $node = $node->firstChild;
    $error = new Recurly_FieldError();

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
