<?php

namespace Katanox\Model;

class RatePlanPolicy
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $charge_type;
    /**
     * @var float
     */
    public $amount;

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
}
