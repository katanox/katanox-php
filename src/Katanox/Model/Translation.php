<?php

namespace Katanox\Model;

use JsonSerializable;

class Translation implements JsonSerializable
{
    public ?string $description = null;

    public ?string $locale = null;

    /**
     * Translation constructor.
     */
    public function __construct(string $description, string $locale)
    {
        $this->description = $description;
        $this->locale = $locale;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): Translation
    {
        $this->description = $description;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->description;
    }

    public function setLocale(string $locale): Translation
    {
        $this->locale = $locale;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'locale' => $this->locale,
        ];
    }
}
