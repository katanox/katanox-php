<?php

namespace Katanox\Model;

class Translation
{
    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $locale;

    /**
     * Translation constructor.
     */
    public function __construct(string $description, string $locale)
    {
        $this->description = $description;
        $this->locale = $locale;
    }
}
