<?php

namespace Recurly;

/**
 * Resource stub for Recurly API. Call get() to retrieve the stubbed resource.
 */
class Stub extends Base
{
    /*
     * Stubbed object type. Useful for printing the current object as a string.
     */
    public $objectType;

    public function __construct($objectType, $href, $client = null)
    {
        parent::__construct($href, $client);
        $this->objectType = $objectType;
    }

    /**
     * Retrieve the stubbed resource.
     */
    public function get()
    {
        $stub = self::_get($this->_href, $this->_client);
        if ($this->_href && !$stub->getHref()) {
            $stub->setHref($this->_href);
        }

        return $stub;
    }

    public function __toString()
    {
        return "<Stub[{$this->objectType}] href={$this->_href}>";
    }
}
