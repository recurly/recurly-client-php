<?php

namespace Recurly;

class Link
{
    public $href;
    public $name;
    public $method;

    public function __construct($name, $href, $method)
    {
        $this->href = $href;
        $this->name = $name;
        $this->method = $method;
    }

    public function __toString()
    {
        return "<Link[{$this->name}] href=\"$this->href\" method=\"$this->method\">";
    }
}
