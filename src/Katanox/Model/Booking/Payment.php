<?php

namespace Katanox\Model\Booking;

use InvalidArgumentException;
use Katanox\Exceptions\MissingParametersException;
use function Katanox\Model\Helpers\areRequiredFieldsSet;
use Katanox\Model\Validatable;

class Payment implements Validatable
{
    private ?string $type = null;
    private ?string $card_number = null;
    private ?string $cvv = null;
    private ?string $card_holder = null;
    private ?string $expiry_month = null;
    private ?string $expiry_year = null;

    public function validate(): Payment
    {
        $requiredFields = [
            $this->type,
            $this->card_number,
            $this->cvv,
            $this->card_holder,
            $this->expiry_month,
            $this->expiry_year,
        ];

        if (!areRequiredFieldsSet($requiredFields)) {
            throw new MissingParametersException('Invalid Payment.  Required fields are: type, cardNumber, cvv, cardHolder, expiryMonth, expiryYear');
        }

        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'card_number' => $this->card_number,
            'cvv' => $this->cvv,
            'card_holder' => $this->card_holder,
            'expiry_month' => $this->expiry_month,
            'expiry_year' => $this->expiry_year,
        ];
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    public function getCardNumber(): string
    {
        return $this->card_number;
    }

    public function setCardNumber(string $cardNumber): Payment
    {
        $this->card_number = $cardNumber;

        return $this;
    }

    public function getCVV(): string
    {
        return $this->cvv;
    }

    public function setCVV(string $cvv): Payment
    {
        $this->cvv = $cvv;

        return $this;
    }

    public function getCardHolder(): string
    {
        return $this->card_holder;
    }

    public function setCardHolder(string $cardHolder): Payment
    {
        $this->card_holder = $cardHolder;

        return $this;
    }

    public function getExpiryMonth(): string
    {
        return $this->expiry_month;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setExpiryMonth(string $expiryMonth): Payment
    {
        if (2 !== strlen($expiryMonth)) {
            throw new InvalidArgumentException('Invalid expiry month.  Format must be: xx');
        }
        $this->expiry_month = $expiryMonth;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setExpiryYear(string $expiryYear): Payment
    {
        if (4 !== strlen($expiryYear)) {
            throw new InvalidArgumentException('Invalid expiry year.  Format must be: xxxx');
        }
        $this->expiry_year = $expiryYear;

        return $this;
    }

    public function getExpiryYear(): string
    {
        return $this->expiry_year;
    }
}
