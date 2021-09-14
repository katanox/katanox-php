<?php

namespace Katanox\Model;

use JsonSerializable;

class RatePlanPolicy implements JsonSerializable
{
    private ?string $name = null;
    private ?string $description = null;
    private ?string $charge_type = null;
    private float $amount;

    /**
     * RatePlanPolicy constructor.
     */
    public function __construct(string $name, string $description, string $charge_type, float $amount)
    {
        $this->name = $name;
        $this->description = $description;
        $this->charge_type = $charge_type;
        $this->amount = $amount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): RatePlanPolicy
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): RatePlanPolicy
    {
        $this->description = $description;

        return $this;
    }

    public function getChargeType(): string
    {
        return $this->charge_type;
    }

    public function setChargeType(string $charge_type): RatePlanPolicy
    {
        $this->charge_type = $charge_type;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): RatePlanPolicy
    {
        $this->amount = $amount;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'charge_type' => $this->charge_type,
            'amount' => $this->amount,
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
