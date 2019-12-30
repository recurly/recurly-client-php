<?php
/**
 * Placeholders to aid with PHPUnit 6+ compatibility in the test suite.
 *
 * PHPUnit 6 introduced namespaces, moving the base test class from PHPUnit_Framework_TestCase to
 * PHPUnit\Framework\TestCase.
 *
 * @link https://phpunit.de/announcements/phpunit-6.html
 */

namespace PHPUnit\Framework;

use PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{

}