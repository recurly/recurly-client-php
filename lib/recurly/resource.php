<?php

abstract class Recurly_Resource extends Recurly_Base
{
  use XmlDoc;


  /**
   * @param string $method
   * @param string $uri
   * @param string $data
   * @throws Recurly_Error
   */
  protected function _save($method, $uri, $data = null)
  {
    if ($uri[0] !== '/' and strpos($uri, "https") === false){
      $uri = '/' . $uri;
    }

    $this->resetErrors();

    if (is_null($data)) {
      $data = $this->xml();
    }

    $response = $this->_client->request($method, $uri, $data);
    $response->assertValidResponse();

    if (isset($response->body)) {
      self::__parseXmlToUpdateObject($response->body);
    }
    $response->assertSuccessResponse($this);
  }

  protected function isEmbedded($node, $xmlKey) {
    $path = explode('/', $node->getNodePath());
    $last = $path[count($path)-1];
    return $last == $xmlKey;
  }
}
