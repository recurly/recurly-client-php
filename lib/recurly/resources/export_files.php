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
class ExportFiles extends RecurlyResource
{
    private $_files;
    private $_object;

    protected static $array_hints = [
        'setFiles' => '\Recurly\Resources\ExportFile',
    ];

    
    /**
    * Getter method for the files attribute.
    * 
    *
    * @return array
    */
    public function getFiles(): array
    {
        return $this->_files ?? [] ;
    }

    /**
    * Setter method for the files attribute.
    *
    * @param array $files
    *
    * @return void
    */
    public function setFiles(array $files): void
    {
        $this->_files = $files;
    }

    /**
    * Getter method for the object attribute.
    * Object type
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