<?php

use PHPUnit\Framework\TestCase;

abstract class RecurlyTestCase extends TestCase
{
    protected function setUp(): void
    {
        $this->fixtures = new FixtureLoader();
    }

    protected function setUpRequest()
    {
        $account_create = $this->fixtures->loadJsonFixture('account_create', ['type' => 'array']);
        $this->method = 'GET';
        $this->path = '/accounts';
        $this->body = $account_create;
        $this->options = [
            'params' => [
                'param-1' => 1,
                'param-2' => 'Param 2',
            ],
            'headers' => [
                'header-1' => 'Header 1',
                'header-2' => 'Header 2',
            ]
        ];
        $this->request = new \Recurly\Request(
            $this->method,
            $this->path,
            $this->body,
            $this->options
        );
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