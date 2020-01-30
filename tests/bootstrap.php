<?php

use PHPUnit\Framework\TestCase;

abstract class RecurlyTestCase extends TestCase
{
    protected function setUp(): void
    {
        $this->fixtures = new FixtureLoader();
    }
}

class FixtureLoader
{
    const DEFAULT_OPTIONS = array(
        'type' => 'object'
    );

    public function loadJsonFixture(string $filename, array $options = [])
    {
        $options = array_merge(static::DEFAULT_OPTIONS, $options);

        $fixture = file_get_contents(__DIR__ . '/fixtures/' . $filename . '.json');

        switch($options['type']) {
            case 'object':
                return json_decode($fixture);
            case 'array':
                return json_decode($fixture, true);
            case 'string':
                return $fixture;
        }
    }
}