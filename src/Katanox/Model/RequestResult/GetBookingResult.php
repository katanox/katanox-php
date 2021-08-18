<?php

namespace Katanox\Model\RequestResult;

use Katanox\Model\Booking\Booking;

class GetBookingResult implements \JsonSerializable
{
    // @var ?Booking
    private $booking;

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
}
