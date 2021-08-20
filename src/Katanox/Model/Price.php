<?php

namespace Katanox\Model;

use JsonSerializable;

class Price implements JsonSerializable
{
    private ?float $amount = null;
    private ?string $currency = null;

    public function __construct(float $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setAmount(float $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function toArray()
    {
        return [
            'amount' => $this->amount,
            'currency' => $this->currency,
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
