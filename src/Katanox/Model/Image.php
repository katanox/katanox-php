<?php

namespace Katanox\Model;

use JsonSerializable;

class Image implements JsonSerializable
{
    private ?string $tag = null;

    private ?string $url = null;

    public function __construct(string $tag, string $url)
    {
        $this->tag = $tag;
        $this->url = $url;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): Image
    {
        $this->tag = $tag;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): Image
    {
        $this->url = $url;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return [
            'tag' => $this->tag,
            'url' => $this->url,
        ];
    }
}
