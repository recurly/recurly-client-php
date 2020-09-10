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
class ExportFile extends RecurlyResource
{
    private $_href;
    private $_md5sum;
    private $_name;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the href attribute.
    * A presigned link to download the export file.
    *
    * @return ?string
    */
    public function getHref(): ?string
    {
        return $this->_href;
    }

    /**
    * Setter method for the href attribute.
    *
    * @param string $href
    *
    * @return void
    */
    public function setHref(string $href): void
    {
        $this->_href = $href;
    }

    /**
    * Getter method for the md5sum attribute.
    * MD5 hash of the export file.
    *
    * @return ?string
    */
    public function getMd5sum(): ?string
    {
        return $this->_md5sum;
    }

    /**
    * Setter method for the md5sum attribute.
    *
    * @param string $md5sum
    *
    * @return void
    */
    public function setMd5sum(string $md5sum): void
    {
        $this->_md5sum = $md5sum;
    }

    /**
    * Getter method for the name attribute.
    * Name of the export file.
    *
    * @return ?string
    */
    public function getName(): ?string
    {
        return $this->_name;
    }

    /**
    * Setter method for the name attribute.
    *
    * @param string $name
    *
    * @return void
    */
    public function setName(string $name): void
    {
        $this->_name = $name;
    }
}