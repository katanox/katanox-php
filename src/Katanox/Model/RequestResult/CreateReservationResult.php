<?php

namespace Katanox\Model\RequestResult;

use Katanox\Model\Booking\CreateResourceLinks;
use Katanox\Model\Booking\Reservation;

class CreateReservationResult implements \JsonSerializable
{
    /**
     * @var Reservation
     */
    private $reservation;

    /**
     * @var CreateResourceLinks
     */
    private $links;

    /**
     * @var bool
     */
    private $created;

    private array $errors;

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return $this;
    }

    public function getReservation(): Reservation
    {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation): void
    {
        $this->reservation = $reservation;
    }

    public function getLinks()
    {
        return $this->links;
    }

    // @param CreateResourceLinks $links
    public function setLinks($links)
    {
        $this->links = $links;
    }

    public function isCreated()
    {
        return $this->created;
    }

    public function setIsCreated($isCreated)
    {
        $this->created = $isCreated;
    }

    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
