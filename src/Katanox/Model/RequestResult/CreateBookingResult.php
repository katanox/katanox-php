<?php

namespace Katanox\Model\RequestResult;

use Katanox\Model\Booking\Booking;
use Katanox\Model\Booking\CreateResourceLinks;

class CreateBookingResult implements \JsonSerializable
{
    private ?Booking $booking = null;

    /**
     * @var CreateResourceLinks
     */
    private $links;

    private $created;

    private array $errors = [];

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return $this;
    }

    public function getBooking(): ?Booking
    {
        return $this->booking;
    }

    public function setBooking(Booking $data): void
    {
        $this->booking = $data;
    }

    public function getLinks()
    {
        return $this->links;
    }

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

    public function getErrors()
    {
        return $this->errors;
    }
}
