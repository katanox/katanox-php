<?php

namespace Katanox\Model;

class RatePlan
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
     * @var RatePlanPolicy
     */
    public $cancellation_policy;

    /**
     * @var RatePlanPolicy
     */
    public $no_show_policy;

    /**
     * @var Translation[]
     */
    public $translations;

    public function getId(): string
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
}
