<?php

namespace Katanox\Model;

class AvailabilityAndPrice
{
    /**
     * @var string
     */
    public $unit_id;
    /**
     * @var string
     */
    public $rate_plan_id;
    /**
     * @var string
     */
    public $property_id;

    /**
     * @var Price
     */
    public $price;

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
}
