<?php

namespace Katanox\Model;

use JsonSerializable;

class AvailabilityAndPrice implements JsonSerializable
{
    public ?string $unit_id = null;

    public ?string $rate_plan_id = null;

    public ?string $property_id = null;

    public ?Price $price = null;

    /**
     * AvailabilityAndPrice constructor.
     */
    public function __construct(string $unit_id, string $rate_plan_id, string $property_id, Price $price)
    {
        $this->unit_id = $unit_id;
        $this->rate_plan_id = $rate_plan_id;
        $this->property_id = $property_id;
        $this->price = $price;
    }

    public function setUnitId(string $unitId)
    {
        $this->unit_id = $unitId;
    }

    public function getUnitId(): ?string
    {
        return $this->unit_id;
    }

    public function setRatePlanId(string $ratePlanId)
    {
        $this->rate_plan_id = $ratePlanId;
    }

    public function getRatePlanId(): ?string
    {
        return $this->rate_plan_id;
    }

    public function setPropertyId(string $propertyId)
    {
        $this->property_id = $propertyId;
    }

    public function getPropertyId(): ?string
    {
        return $this->property_id;
    }

    public function setPrice(Price $price)
    {
        $this->price = $price;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            'property_id' => $this->property_id,
            'rate_plan_id' => $this->rate_plan_id,
            'unit_id' => $this->unit_id,
            'price' => $this->price->toArray(),
        ];
    }
}
