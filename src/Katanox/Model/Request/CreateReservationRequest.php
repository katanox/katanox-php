<?php

namespace Katanox\Model\Request;

use InvalidArgumentException;
use Katanox\Exceptions\MissingParametersException;
use Katanox\Model\Booking\Reservation;
use function Katanox\Model\Helpers\areRequiredFieldsSet;
use Katanox\Model\Validatable;

class CreateReservationRequest implements Validatable
{
    private ?Reservation $reservation = null;

    private ?string $booking_id = null;

    public function toArray(): array
    {
        return [
            'reservation' => $this->reservation->toArray(),
            'booking_id' => $this->booking_id,
        ];
    }

    /**
     * @throws MissingParametersException
     */
    public function validate(): CreateReservationRequest
    {
        $requiredFields = [
            $this->booking_id,
            $this->reservation,
        ];

        if (!areRequiredFieldsSet($requiredFields)) {
            throw new MissingParametersException('Invalid CreateReservationRequest.  Required fields: booking id, reservation.');
        }
        $this->reservation->validate();

        return $this;
    }

    public function setReservation(Reservation $reservation): CreateReservationRequest
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getReservation(): Reservation
    {
        return $this->reservation;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setBookingId(string $id): CreateReservationRequest
    {
        if ('' === $id) {
            throw new InvalidArgumentException('Booking id can not be empty');
        }
        $this->booking_id = $id;

        return $this;
    }

    public function getBookingId(): string
    {
        return $this->booking_id;
    }
}
