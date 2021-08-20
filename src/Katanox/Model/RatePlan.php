<?php

namespace Katanox\Model;

use JsonSerializable;

class RatePlan implements JsonSerializable
{
    private ?string $id = null;

    private string $name;

    private ?string $description;

    private RatePlanPolicy $cancellation_policy;

    private RatePlanPolicy $no_show_policy;

    /**
     * @var Translation[]
     */
    private array $translations = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): RatePlan
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): RatePlan
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): RatePlan
    {
        $this->description = $description;

        return $this;
    }

    public function getCancellationPolicy(): RatePlanPolicy
    {
        return $this->cancellation_policy;
    }

    public function setCancellationPolicy(RatePlanPolicy $cancellation_policy): RatePlan
    {
        $this->cancellation_policy = $cancellation_policy;

        return $this;
    }

    public function getNoShowPolicy(): RatePlanPolicy
    {
        return $this->no_show_policy;
    }

    public function setNoShowPolicy(RatePlanPolicy $no_show_policy): RatePlan
    {
        $this->no_show_policy = $no_show_policy;

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
    public function setTranslations($translations): RatePlan
    {
        $this->translations = $translations;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'cancellation_policy' => $this->cancellation_policy,
            'no_show_policy' => $this->no_show_policy,
            'translations' => $this->translations,
        ];
    }
}
