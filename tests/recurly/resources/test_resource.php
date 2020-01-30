<?php

namespace Recurly\Resources;

class TestResource extends \Recurly\RecurlyResource
{
    private $_object;
    private $_name;
    private $_single_child;
    private $_array_children;

    public function getObject(): string
    {
        return $this->_object;
    }

    public function setObject(string $value): void
    {
        $this->_object = $value;
    }

    public function setName(string $name): void
    {
        $this->_name = $name;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setSingleChild(\Recurly\Resources\TestResource $single_child): void
    {
        $this->_single_child = $single_child;
    }

    public function getSingleChild(): \Recurly\Resources\TestResource
    {
        return $this->_single_child;
    }

    public function setArrayChildren(array $array_children): void
    {
        $this->_array_children = $array_children;
    }

    public function getArrayChildren(): array
    {
        return $this->_array_children;
    }

    public static function hintArrayType($key): string
    {
        $array_hints = array(
            'setArrayChildren' => '\Recurly\Resources\TestResource',
        );
        return $array_hints[$key];
    }
}