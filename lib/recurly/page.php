<?php

namespace Recurly;

class Page extends \Recurly\RecurlyResource
{
    private $_data = [];
    private $_has_more;
    private $_next;
    private $_cursor = 0;


    /**
     * Setter method for the Page results.
     * 
     * @param array $data An associative array of ???
     * 
     * @return void
     */
    public function setData(array $data): void
    {
        $this->_data = $data;
    }

    /**
     * Indicates whether there are more pages of results.
     * 
     * @return bool
     */
    public function getHasMore(): bool
    {
        return !!$this->_has_more;
    }

    /**
     * Setter method for whether there are more pages
     * 
     * @param bool $has_more Whether there are more pages of results.
     *
     * @return void
     */
    public function setHasMore(bool $has_more): void
    {
        $this->_has_more = $has_more;
    }

    /**
     * The combined path and query string to fetch the next page of results. 
     * 
     * @return string 
     */
    public function getNext(): string
    {
        return $this->_next;
    }

    /**
     * Setter method for the next page of results.
     * 
     * @param string $next The combined path and query string to fetch the next page
     *                     of results. 
     * 
     * @return void
     */
    public function setNext(string $next): void
    {
        $this->_next = $next;
    }

    /**
     * The current resource at the cursor of the page.
     * 
     * @return \Recurly\RecurlyResource
     */
    public function current(): \Recurly\RecurlyResource
    {
        return $this->_data[$this->_cursor++];
    }

    /**
     * Used to determine if there are more resources available in the page.
     * 
     * @return bool
     */
    public function valid(): bool
    {
        return array_key_exists($this->_cursor, $this->_data);
    }
}