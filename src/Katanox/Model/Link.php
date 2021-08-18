<?php

namespace Katanox\Model;

class Link
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
     * Link constructor.
     */
    public function __construct(string $method, string $url)
    {
        $this->method = $method;
        $this->url = $url;
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
}
