<?php

namespace Katanox\Model;

class Image
{
    /**
     * @var string
     */
    public $tag;

    /**
     * @var string
     */
    public $url;

    /**
     * Image constructor.
     */
    public function __construct(string $tag, string $url)
    {
        $this->tag = $tag;
        $this->url = $url;
    }
}
