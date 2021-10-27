<?php

namespace Katanox\Model\Booking;

use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;
use JsonSerializable;
use Katanox\Exceptions\MissingParametersException;
use function Katanox\Model\Helpers\areArrayFieldsFilled;
use function Katanox\Model\Helpers\areRequiredFieldsSet;
use Katanox\Model\Price;
use Katanox\Model\Validatable;

class Reservation implements Validatable, JsonSerializable
{
    private array $comments = [];
    /**
     * @var Person[]
     */
    private array $guests = [];
    private ?string $check_in = null;
    private ?string $check_out = null;
    private ?Price $price = null;
    private ?string $rate_plan_id = null;
    private ?string $unit_id = null;
    private int $adults = 0;
    private int $children = 0;
    private ?string $status = null;
    private ?string $id = null;


    public function validate(): Reservation
    {
        $requiredFields = [
            $this->guests,
            $this->check_in,
            $this->check_out,
            $this->price,
            $this->rate_plan_id,
            $this->unit_id,
            $this->adults,
            $this->children,
        ];

        if (!areRequiredFieldsSet($requiredFields) || !areArrayFieldsFilled([$this->guests])) {
            throw new MissingParametersException('Invalid Reservation.  Required fields are: guests, check in, check out, price, rate plan id, unit id, adults, children');
        }

        return $this;
    }

    public function toArray(): array
    {
        $guests = new ArrayCollection($this->guests);

        $data = [
            'guests' => $guests->map(fn ($g) => $g->toArray())->toArray(),
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'price' => $this->price->toArray(),
            'rate_plan_id' => $this->rate_plan_id,
            'unit_id' => $this->unit_id,
            'adults' => $this->adults,
            'children' => $this->children,
            'comments' => $this->comments
        ];
        if (null !== $this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function setComments(array $comments): Reservation
    {
        $this->comments = $comments;

        return $this;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function setCheckIn(string $checkIn): Reservation
    {
        $this->check_in = $checkIn;

        return $this;
    }

    public function getCheckIn(): string
    {
        return $this->check_in;
    }

    public function setCheckOut(string $checkOut): Reservation
    {
        $this->check_out = $checkOut;

        return $this;
    }

    public function getCheckOut(): string
    {
        return $this->check_out;
    }

    public function setPrice(Price $price): Reservation
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }

    public function setRatePlanId(string $ratePlanId): Reservation
    {
        $this->rate_plan_id = $ratePlanId;

        return $this;
    }

    public function getRatePlanId(): int
    {
        return $this->rate_plan_id;
    }

    public function setUnitId(string $unitId): Reservation
    {
        $this->unit_id = $unitId;

        return $this;
    }

    public function getUnitId(): int
    {
        return $this->unit_id;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setAdults(int $adults): Reservation
    {
        if ($adults < 0) {
            throw new InvalidArgumentException('value must be >= 0');
        }
        $this->adults = $adults;

        return $this;
    }

    public function getAdults(): int
    {
        return $this->adults;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setChildren(int $children): Reservation
    {
        if ($children < 0) {
            throw new InvalidArgumentException('value must be >= 0');
        }
        $this->children = $children;

        return $this;
    }

    public function getChildren(): int
    {
        return $this->children;
    }

    public function setStatus(string $status): Reservation
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param Person[]
     * @param mixed $guests
     *
     * @throws InvalidArgumentException
     */
    public function setGuests($guests): Reservation
    {
        $collection = new ArrayCollection($guests);

        $guestsAreNotValid = $collection
            ->filter(fn ($v) => is_object($v) && Person::class === get_class($v))
            ->count() !== count($guests);

        if ((0 === count($guests)) || $guestsAreNotValid) {
            throw new InvalidArgumentException('Invalid guests array.  Either empty or does not contain Guest instances');
        }

        $this->guests = $guests;

        return $this;
    }

    public function getGuests(): array
    {
        return $this->guests;
    }

    public function setId(string $id): Reservation
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}
