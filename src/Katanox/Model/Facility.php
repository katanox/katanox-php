<?php

namespace Katanox\Model;

class Facility
{
    /**
     * @var string
     */
    public $category;

    /**
     * @var string
     */
    public $name;

    /**
     * Facility constructor.
     */
    public function __construct(string $category, string $name)
    {
        $this->category = $category;
        $this->name = $name;
    }
}
