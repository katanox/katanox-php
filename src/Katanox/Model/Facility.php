<?php

namespace Katanox\Model;

class Facility
{
    private ?string $category = null;

    private ?string $name = null;

    public function __construct(string $category, string $name)
    {
        $this->category = $category;
        $this->name = $name;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): Facility
    {
        $this->category = $category;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): Facility
    {
        $this->name = $name;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return [
            'category' => $this->category,
            'name' => $this->name,
        ];
    }
}
