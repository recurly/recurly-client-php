<?php

namespace Recurly;

/**
* @codeCoverageIgnore
*/
interface HttpAdapterInterface
{
    public function execute($method, $url, $body, $headers): array;
}
