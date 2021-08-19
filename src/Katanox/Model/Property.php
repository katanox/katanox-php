<?php

namespace Katanox\Model;

use JsonSerializable;

class Property implements JsonSerializable
{
    private ?string $id = null;

    private ?string $name = null;

    private ?string $description = null;

    private ?string $stars = null;

    private ?string $address_line_1 = null;

    private ?string $address_line_2 = null;

    private ?string $city = null;

    private ?string $postcode = null;

    private ?string $country = null;

    private ?Location $location = null;

    private ?string $phone_number = null;

    private ?string $email = null;

    private ?string $currency = null;

    /**
     * @var Image[]
     */
    private array $images = [];

    /**
     * @var Translation[]
     */
    private array $translations = [];

    /**
     * @var Facility[]
     */
    private array $facilities = [];

    /**
     * @var Unit[]
     */
    private array $units = [];

    /**
     * @var RatePlan[]
     */
    private array $rate_plans = [];

    /**
     * @var AvailabilityAndPrice[]
     */
    private array $prices = [];

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'stars' => $this->stars,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'country' => $this->country,
            'location' => $this->location,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'currency' => $this->currency,
            'images' => $this->images,
            'translations' => $this->translations,
            'facilities' => $this->facilities,
            'units' => $this->units,
            'rate_plans' => $this->rate_plans,
						'prices' => $this->prices
        ];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Property
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Property
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Property
    {
        $this->description = $description;

        return $this;
    }

    public function getStars(): int
    {
        return $this->stars;
    }

    public function setStars(int $stars): Property
    {
        $this->stars = $stars;

        return $this;
    }

    public function getAddressLine1(): string
    {
        return $this->address_line_1;
    }

    public function setAddressLine1(string $address_line_1): Property
    {
        $this->address_line_1 = $address_line_1;

        return $this;
    }

    public function getAddressLine2(): string
    {
        return $this->address_line_2;
    }

    public function setAddressLine2(string $address_line_2): Property
    {
        $this->address_line_2 = $address_line_2;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): Property
    {
        $this->city = $city;

        return $this;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): Property
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): Property
    {
        $this->country = $country;

        return $this;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): Property
    {
        $this->location = $location;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): Property
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Property
    {
        $this->email = $email;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): Property
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return Image[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param Image[] $images
     */
    public function setImages(array $images): Property
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return Translation[]
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * @param Translation[] $translations
     */
    public function setTranslations(array $translations): Property
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * @return Facility[]
     */
    public function getFacilities(): array
    {
        return $this->facilities;
    }

    /**
     * @param Facility[] $facilities
     */
    public function setFacilities(array $facilities): Property
    {
        $this->facilities = $facilities;

        return $this;
    }

    /**
     * @return Unit[]
     */
    public function getUnits(): array
    {
        return $this->units;
    }

    /**
     * @param Unit[] $units
     */
    public function setUnits(array $units): Property
    {
        $this->units = $units;

        return $this;
    }

    /**
     * @return RatePlan[]
     */
    public function getRatePlans(): array
    {
        return $this->rate_plans;
    }

    /**
     * @param RatePlan[] $rate_plans
     */
    public function setRatePlans(array $rate_plans): Property
    {
        $this->rate_plans = $rate_plans;

        return $this;
    }

    /**
     * @return AvailabilityAndPrice[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param AvailabilityAndPrice[] $prices
     */
    public function setPrices(array $prices): Property
    {
        $this->prices = $prices;

        return $this;
    }
}
