<?php

namespace Katanox\Model;

class Unit
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var Image[]
     */
    public $images;

    /**
     * @var null|Translation[]
     */
    public $translations;

    /**
     * @var Facility[]
     */
    public $amenities;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Unit
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Unit
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
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
}
