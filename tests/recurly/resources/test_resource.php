<?php

namespace Recurly\Resources;

class TestResource extends \Recurly\RecurlyResource
{
    private $_object;
    private $_name;
    private $_single_child;
    private $_resource_array;
    private $_string_array;

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

    public function setResourceArray(array $resource_array): void
    {
        $this->_resource_array = $resource_array;
    }

    public function getResourceArray(): array
    {
        return $this->_resource_array;
    }

    public function setStringArray(array $string_array): void
    {
        $this->_string_array = $string_array;
    }

    public function getStringArray(): array
    {
        return $this->_string_array;
    }

    public static function hintArrayType($key): string
    {
        $array_hints = array(
            'setResourceArray' => '\Recurly\Resources\TestResource',
            'setStringArray' => 'string',
        );
        return $array_hints[$key];
    }
}