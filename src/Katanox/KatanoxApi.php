<?php

namespace Katanox;

use GuzzleHttp\Client;
use Katanox\Http\GuzzleClient;
use Katanox\Resource\AvailabilityResource;
use Katanox\Resource\BookingResource;
use Katanox\Resource\PropertyResource;

/**
 * @property AvailabilityResource availabilityResource
 * @property BookingResource  bookingResource
 * @property PropertyResource propertyResource
 */
class KatanoxApi
{
    private ?AvailabilityResource $availabilityResource = null;
    private ?BookingResource $bookingResource = null;
    private ?PropertyResource $propertyResource = null;

    public function __construct(string $apiKey, bool $isSandbox = false)
    {
        $httpClient = new GuzzleClient(new Client());
        $baseUrl = 'https://api.katanox.com';
        if ($isSandbox) {
            $baseUrl = 'https://api-sandbox.katanox.com';
        }
        $this->availabilityResource = new AvailabilityResource($httpClient, $baseUrl, $apiKey);
        $this->bookingResource = new BookingResource($httpClient, $baseUrl, $apiKey);
        $this->propertyResource = new PropertyResource($httpClient, $baseUrl, $apiKey);
    }

    public function getAvailabilityResource(): AvailabilityResource
    {
        return $this->availabilityResource;
    }

    public function getBookingResource(): BookingResource
    {
        return $this->bookingResource;
    }

    public function getPropertyResource(): PropertyResource
    {
        return $this->propertyResource;
    }
}
