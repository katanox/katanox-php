<?php

namespace Katanox\Http;

use GuzzleHttp\Psr7\Response;
use Katanox\Exceptions\HttpException;

interface Client
{
    /**
     * @throws HttpException
     */
    public function request(
        string $method,
        string $url,
        string $apiKey,
        array $params = [],
        array $data = [],
        array $headers = [],
        int $timeout = 30
    ): Response;
}
