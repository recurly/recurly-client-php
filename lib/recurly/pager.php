<?php

namespace Recurly;

class Pager implements \Iterator
{
    private $_client;
    private $_path;
    private $_params;
    private $_current_page;

    /**
     * Constructor
     * 
     * @param \Recurly\BaseClient $client A \Recurly\BaseClient that can make API
     *                                    requests 
     * @param string              $path   Tokenized path to request
     * @param array               $params (optional) Query string parameters
     */
    public function __construct(\Recurly\BaseClient $client, string $path, ?array $params = []) // phpcs:ignore Generic.Files.LineLength.TooLong
    {
        $this->_client = $client;
        $this->_path = $path;
        $this->_params = $params;
    }

    /**
     * Makes a HEAD request to the API to determine how many total records exist.
     * 
     * @return string
     */
    public function getCount()
    {
        $response = $this->_client->pagerCount($this->_path, $this->_params);
        return $response->getRecordCount();
    }

    /**
     * Performs a request with the pager `limit` set to 1.
     * 
     * @return ?\Recurly\RecurlyResource 
     */
    public function getFirst(): ?\Recurly\RecurlyResource
    {
        $params = array_merge([ 'limit' => 1 ], $this->_params);
        $page = $this->_client->nextPage($this->_path, $params);
        if ($page->valid()) {
            return $page->current();
        }
        return null;
    }

    /**
     * Getter for the Recurly HTTP Response of the current Page
     * 
     * @return \Recurly\Response The Recurly HTTP Response
     */
    public function getResponse(): \Recurly\Response
    {
        return $this->_current_page->getResponse();
    }

    /**
     * Implementation of the Iterator interfaces `rewind` method.
     * Resets the Iterator to the first page of results.
     * 
     * @return void
     */
    public function rewind(): void
    {
        $this->_current_page = $this->_client->nextPage(
            $this->_path,
            $this->_params
        );
    }

    /**
     * Implementation of the Iterator interfaces `current` method.
     * 
     * @return \Recurly\RecurlyResource
     */
    public function current(): \Recurly\RecurlyResource
    {
        return $this->_current_page->current();
    }

    /**
     * Implementation of the Iterator interfaces `key` method.
     * Will return NULL for every iteration.
     * 
     * @return             void
     * @codeCoverageIgnore
     */
    public function key(): void
    {
        //NOOP
    }

    /**
     * Implementation of the Iterator interfaces `next` method.
     * 
     * @return             void
     * @codeCoverageIgnore
     */
    public function next(): void
    {
        //NOOP
    }

    /**
     * Implementation of the Iterator interfaces `valid` method.
     * 
     * @return bool
     */
    public function valid(): bool
    {
        if (!$this->_current_page->valid() && $this->_current_page->getHasMore()) {
            $this->_loadNextPage();
        }
        return $this->_current_page->valid();
    }

    /**
     * Fetches the next page from the API server.
     * 
     * @return void
     */
    private function _loadNextPage(): void
    {
        // TODO: The response should persist the original params, right?
        $next_page = $this->_current_page->getNext();
        $this->_current_page = $this->_client->nextPage($next_page, null);
    }
}