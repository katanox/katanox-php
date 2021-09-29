<?php

namespace Katanox\Model\Booking;

use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;
use JsonSerializable;
use Katanox\Exceptions\MissingParametersException;
use Katanox\Model\Price;

use function Katanox\Model\Helpers\areRequiredFieldsSet;
use function Katanox\Model\Helpers\modelsCollectionToArray;
use Katanox\Model\Validatable;

class Booking implements Validatable, JsonSerializable
{
    private ?Price $total_price = null;
    private ?Person $customer = null;
    /**
     * @var Reservation[]
     */
    private array $reservations = [];
    private array $comments = [];
    private ?Payment $payment = null;
    private ?string $id = null;

    public function validate(): Booking
    {
        $requiredFields = [
            $this->total_price,
            $this->customer,
            $this->reservations,
            $this->payment,
        ];
        if (!areRequiredFieldsSet($requiredFields) || 0 === count($this->reservations)) {
            throw new MissingParametersException('Invalid Booking.  Required fields are: total price, customer, payment, reservations.  Reservations must be > 0');
        }
        $this->customer->validate();
        $this->payment->validate();

        return $this;
    }

    public function toArray(): array
    {
        $reservations = modelsCollectionToArray($this->reservations);
        $baseRepresentation = [
            'total_price' => $this->total_price->toArray(),
            'customer' => $this->customer->toArray(),
            'reservations' => $reservations,
            'comments' => $this->comments,
            'payment' => $this->payment->toArray(),
        ];

        if (null !== $this->id) {
            $baseRepresentation['id'] = $this->id;
        }

        return $baseRepresentation;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function setCustomer(Person $customer): Booking
    {
        $this->customer = $customer;

        return $this;
    }

    public function getCustomer(): Person
    {
        return $this->customer;
    }

    public function setComments(array $comments): Booking
    {
        $this->comments = $comments;

        return $this;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function setTotalPrice(Price $totalPrice): Booking
    {
        $this->total_price = $totalPrice;

        return $this;
    }

    public function getTotalPrice(): ?Price
    {
        return $this->total_price;
    }

    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;

        return $this;
    }

    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @param Reservation[]
     * throws InvalidArgumentException
     */
    public function setReservations(array $reservations): Booking
    {
        $collection = new ArrayCollection($reservations);

        $reservationsAreNotValid = $collection
            ->filter(fn ($v) => is_object($v) && Reservation::class === get_class($v))
            ->count() !== count($reservations);

        if ((0 === count($reservations)) || $reservationsAreNotValid) {
            throw new InvalidArgumentException('Invalid reservations array.  Either empty or does not contain Reservation instances');
        }

        $this->reservations = $reservations;

        return $this;
    }

    public function getReservations(): array
    {
        return $this->reservations;
    }

    public function setId(string $id): Booking
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}
