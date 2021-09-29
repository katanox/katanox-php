<?php

namespace Katanox\Model\Booking;

use Katanox\Exceptions\MissingParametersException;
use function Katanox\Model\Helpers\areRequiredFieldsSet;
use Katanox\Model\Validatable;

class Person implements Validatable
{
    private ?string $last_name = null;
    private ?string $first_name = null;
    private ?string $title = null;
    private ?string $birth_date = null;
    private ?string $post_code = null;
    private ?string $city = null;
    private ?string $country = null;
    private ?string $email = null;
    private ?string $phone_number = null;

    public function validate(): Person
    {
        $requiredFields = [
            $this->first_name,
            $this->last_name,
        ];

        if (!areRequiredFieldsSet($requiredFields)) {
            throw new MissingParametersException('Invalid Person.  First and last name parameters are required for a person');
        }

        return $this;
    }

    public function toArray(): array
    {
        return [
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'title' => $this->title,
            'birth_date' => $this->birth_date,
            'postcode' => $this->post_code,
            'city' => $this->city,
            'country' => $this->country,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
        ];
    }

    public function setFirstName(string $firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setLastName(string $lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setBirthDate(?string $birthDate): Person
    {
        $this->birth_date = $birthDate;

        return $this;
    }

    public function getBirthDate(): string
    {
        return $this->birth_date;
    }

    public function setEmail(?string $email): Person
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setCity(string $city): Person
    {
        $this->city = $city;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setPostCode(?string $postCode): Person
    {
        $this->post_code = $postCode;

        return $this;
    }

    public function getPostCode(): string
    {
        return $this->post_code;
    }

    public function setCountry(?string $country): Person
    {
        $this->country = $country;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setPhoneNumber(?string $phoneNumber): Person
    {
        $this->phone_number = $phoneNumber;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }
}
