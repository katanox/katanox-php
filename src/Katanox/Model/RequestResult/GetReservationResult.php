<?php

namespace Katanox\Model\RequestResult;

use Katanox\Model\Booking\Reservation;

class GetReservationResult implements \JsonSerializable
{
    /**
     * @var ?Reservation
     */
    private $reservation;

    /**
     * @var CreateResourceLinks
     */
    private $links;

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(Reservation $data): void
    {
        $this->reservation = $data;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function setLinks($links)
    {
        $this->links = $links;
    }
}
