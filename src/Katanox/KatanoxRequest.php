<?php

namespace Katanox;

class KatanoxRequest
{
    /**
     * @var string
     */
    public $method;
    /**
     * @var string
     */
    public $url;
    /**
     * @var string
     */
    public $apiKey;

    /**
     * @var array
     */
    public $params = [];

    /**
     * @var array
     */
    public $data = [];

    /**
     * @var array
     */
    public $headers = [];

    /**
     * @var int
     */
    public $timeout = 30;

    /**
     * Facility constructor.
     */
    public function __construct(string $method, string $url, string $apiKey, array $params)
    {
        $this->method = $method;
        $this->url = $url;
        $this->apiKey = $apiKey;
        $this->params = $params;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function setTimeout(int $timeout): void
    {
        $this->timeout = $timeout;
    }
}
