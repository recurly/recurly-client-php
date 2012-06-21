<?php

/**
 * Paginate through multiple pages of a resource. Used for lists that
 * may require multiple API calls to retrieve all the results.
 *
 * The pager moves forward only and can rewind to the first item.
 */
abstract class Recurly_Pager extends Recurly_Base implements Iterator
{
  private $_etag;
  private $_position = 0; // position within the current page
  protected $_count;        // total number of records
  protected $_objects;    // current page of records

  /**
   * Number of records in this list.
   * @return integer number of records in list
   */
  public function count()
  {
    if (empty($this->_count)) {
      if (is_null($this->_client))
        $this->_client = new Recurly_Client();
      $response = $this->_client->request(Recurly_Client::HEAD, $this->_href);
      $response->assertValidResponse();
      $this->_loadRecordCount($response);
    }
    return $this->_count;
  }

  /**
   * Rewind to the beginning
   */
  public function rewind() {
    if (isset($this->_links['start'])) {
      $this->_loadFrom($this->_links['start']);
    }
    $this->_position = 0;
  }

  /**
   * The current object
   * @return Recurly_Resource the current object
   */
  public function current()
  {
    if (empty($this->_count)) {
      return null;
    }

    while ($this->_position >= sizeof($this->_objects)) {
      if (isset($this->_links['next'])) {
        $num_objects = sizeof($this->_objects);
        $this->_loadFrom($this->_links['next']);
        $this->_position -= $num_objects;
      }
    }

    return $this->_objects[$this->_position];
  }

  /**
   * @return integer current position within the current page
   */
  public function key() {
    return $this->_position;
  }

  /**
   * Increments the position to the next element
   */
  public function next() {
    ++$this->_position;
  }

  /**
   * @return boolean True if the current position is valid.
   */
  public function valid() {
    return (isset($this->_objects[$this->_position]) || isset($this->_links['next']));
  }


  /**
   * Load another page of results into this pager.
   */
  protected function _loadFrom($uri, $params = null) {
    if (is_null($this->_client))
      $this->_client = new Recurly_Client();

    if (!is_null($params) && is_array($params)) {
      $vals = array();
      foreach ($params as $k => $v) {
        $vals[] = $k . '=' . urlencode($v);
      }
      $uri .= '?' . implode($vals, '&');
    }

    $response = $this->_client->request(Recurly_Client::GET, $uri);
    $response->assertValidResponse();

    $this->_loadRecordCount($response);
    $this->_loadLinks($response);
    $this->_loadObjects($response);
  }
  
  protected static function _setState($params, $state) {
    if (is_null($params))
      $params = array();
    $params['state'] = $state;
    return $params;
  }
  
  /**
   * The 'Links' header contains links to the next, previous, and starting pages.
   * This parses the links header into an array of links if the header is present.
   */
  private function _loadLinks($response) {
    $this->_links = array();

    if (isset($response->headers['Link'])) {
      $links = $response->headers['Link'];
      preg_match_all('/\<([^>]+)\>; rel=\"([^"]+)\"/', $links, $matches);
      if (sizeof($matches) > 2) {
        for ($i = 0; $i < sizeof($matches[1]); $i++) {
          $this->_links[$matches[2][$i]] = $matches[1][$i];
        }
      }
    }
  }
  
  /**
   * Find the total number of results in the collection from the 'X-Records' header.
   */
  private function _loadRecordCount($response)
  {
    if (empty($this->_count) && isset($response->headers['X-Records']))
      $this->_count = intval($response->headers['X-Records']);
  }

  /**
   * Refresh the current object list with the list in the current page of results
   */
  private function _loadObjects($response)
  {
    $this->_objects = array();
    $this->__parseXmlToUpdateObject($response->body);
  }

  protected function updateErrorAttributes() {}


  public function __toString()
  {
    $class = get_class($this);
    $count = (!empty($this->_count) ? "count={$this->_count}" : '');

    return "<{$class}[href={$this->getHref()}] $count>";
  }
}
