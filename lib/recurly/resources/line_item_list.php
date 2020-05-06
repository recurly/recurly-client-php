<?php
/**
 * This file is automatically created by Recurly's OpenAPI generation process
 * and thus any edits you make by hand will be lost. If you wish to make a
 * change to this file, please create a Github issue explaining the changes you
 * need and we will usher them to the appropriate places.
 */
namespace Recurly\Resources;

use Recurly\RecurlyResource;

// phpcs:disable
class LineItemList extends RecurlyResource
{
    private $_data;
    private $_has_more;
    private $_next;
    private $_object;

    protected static $array_hints = array(
        'setData' => '\Recurly\Resources\LineItem',
    );

    
    /**
    * Getter method for the data attribute.
    * 
    *
    * @return array
    */
    public function getData(): array
    {
        return $this->_data ?? [] ;
    }

    /**
    * Setter method for the data attribute.
    *
    * @param array $data
    *
    * @return void
    */
    public function setData(array $data): void
    {
        $this->_data = $data;
    }

    /**
    * Getter method for the has_more attribute.
    * Indicates there are more results on subsequent pages.
    *
    * @return ?bool
    */
    public function getHasMore(): ?bool
    {
        return $this->_has_more;
    }

    /**
    * Setter method for the has_more attribute.
    *
    * @param bool $has_more
    *
    * @return void
    */
    public function setHasMore(bool $has_more): void
    {
        $this->_has_more = $has_more;
    }

    /**
    * Getter method for the next attribute.
    * Path to subsequent page of results.
    *
    * @return ?string
    */
    public function getNext(): ?string
    {
        return $this->_next;
    }

    /**
    * Setter method for the next attribute.
    *
    * @param string $next
    *
    * @return void
    */
    public function setNext(string $next): void
    {
        $this->_next = $next;
    }

    /**
    * Getter method for the object attribute.
    * Will always be List.
    *
    * @return ?string
    */
    public function getObject(): ?string
    {
        return $this->_object;
    }

    /**
    * Setter method for the object attribute.
    *
    * @param string $object
    *
    * @return void
    */
    public function setObject(string $object): void
    {
        $this->_object = $object;
    }
}