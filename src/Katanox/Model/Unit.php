<?php

namespace Katanox\Model;

use JsonSerializable;

class Unit implements JsonSerializable
{
    private ?string $id = null;

    private ?string $name = null;

    private ?string $description = null;

    /**
     * @var Image[]
     */
    private array $images;

    /**
     * @var null|Translation[]
     */
    private ?array $translations = [];

    /**
     * @var Facility[]
     */
    private array $amenities;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): Unit
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): Unit
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): Unit
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Image[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param Image[] $images
     */
    public function setImages(array $images): Unit
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return Translation[]
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * @param Translation[] $translations
     */
    public function setTranslations($translations): Unit
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * @return Facility[]
     */
    public function getAmenities(): array
    {
        return $this->amenities;
    }

    /**
     * @param Facility[] $amenities
     */
    public function setAmenities(array $amenities): Unit
    {
        $this->amenities = $amenities;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'images' => $this->images,
            'translations' => $this->translations,
            'amenities' => $this->amenities,
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
