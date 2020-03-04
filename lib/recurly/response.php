<?php

class Recurly_ClientResponse
{
  use Recurly_HTTPValidations;

  var $statusCode;
  var $headers;
  var $body;

  function __construct($statusCode, $headers, $body) {
    $this->statusCode = $statusCode;
    $this->headers = $headers;
    $this->body = $body;
  }

  /**
   * @param $object
   * @throws Recurly_ValidationError
   */
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

  /**
   * @throws Recurly_Error
   */
  public function assertValidResponse()
  {
    if (!empty($this->headers['recurly-deprecated'])) {
      error_log("WARNING: API version {$this->headers['x-api-version']} is deprecated and will only be available until {$this->headers['recurly-sunset-date']}. Please upgrade the Recurly PHP client.");
    }

    // Successful response code
    if ($this->statusCode >= 200 && $this->statusCode < 400)
      return;

    // Do not fail here if the response is not valid XML
    $error = @$this->parseErrorXml($this->body);
    $this->validateStatusCode($this->statusCode, $error);
  }

  private function parseErrorXml($xml) {
    $dom = new DOMDocument();

    Recurly_Client::disableXmlEntityLoading();

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
        case 'details':
          $error->details = $node->nodeValue;
          break;
      }
      $node = $node->nextSibling;
    }
    return $error;
  }
}
