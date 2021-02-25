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
class UniqueCouponCodeParams extends RecurlyResource
{
    private $_begin_time;
    private $_limit;
    private $_order;
    private $_sort;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the begin_time attribute.
    * The date-time to be included when listing UniqueCouponCodes
    *
    * @return ?string
    */
    public function getBeginTime(): ?string
    {
        return $this->_begin_time;
    }

    /**
    * Setter method for the begin_time attribute.
    *
    * @param string $begin_time
    *
    * @return void
    */
    public function setBeginTime(string $begin_time): void
    {
        $this->_begin_time = $begin_time;
    }

    /**
    * Getter method for the limit attribute.
    * The number of UniqueCouponCodes that will be generated
    *
    * @return ?int
    */
    public function getLimit(): ?int
    {
        return $this->_limit;
    }

    /**
    * Setter method for the limit attribute.
    *
    * @param int $limit
    *
    * @return void
    */
    public function setLimit(int $limit): void
    {
        $this->_limit = $limit;
    }

    /**
    * Getter method for the order attribute.
    * Sort order to list newly generated UniqueCouponCodes (should always be `asc`)
    *
    * @return ?string
    */
    public function getOrder(): ?string
    {
        return $this->_order;
    }

    /**
    * Setter method for the order attribute.
    *
    * @param string $order
    *
    * @return void
    */
    public function setOrder(string $order): void
    {
        $this->_order = $order;
    }

    /**
    * Getter method for the sort attribute.
    * Sort field to list newly generated UniqueCouponCodes (should always be `created_at`)
    *
    * @return ?string
    */
    public function getSort(): ?string
    {
        return $this->_sort;
    }

    /**
    * Setter method for the sort attribute.
    *
    * @param string $sort
    *
    * @return void
    */
    public function setSort(string $sort): void
    {
        $this->_sort = $sort;
    }
}