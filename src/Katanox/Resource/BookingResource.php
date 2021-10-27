<?php

namespace Katanox\Resource;

use JsonMapper;
use Katanox\Exceptions\HttpException;
use Katanox\Exceptions\KatanoxException;
use Katanox\Exceptions\MissingParametersException;
use Katanox\Http\Client;
use Katanox\KatanoxRequest;
use Katanox\Model\Booking\Booking;
use Katanox\Model\Booking\Reservation;
use Katanox\Model\Request\CreateReservationRequest;
use Katanox\Model\Request\UpdateReservationRequest;
use Katanox\Model\RequestResult\CreateBookingResult;
use Katanox\Model\RequestResult\CreateReservationResult;
use Katanox\Model\RequestResult\GetBookingResult;
use Katanox\Model\RequestResult\GetReservationResult;

class BookingResource
{
    protected $baseUrl;

    private string $apiKey;
    private Client $client;
    private $mapper;

    public function __construct(Client $client, string $apiKey)
    {
        $this->baseUrl = 'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings';
        $this->client = $client;
        $this->apiKey = $apiKey;
        $this->mapper = new JsonMapper();
        $this->mapper->bStrictNullTypes = false;
        $this->mapper->bIgnoreVisibility = true;
    }

    /**
     * Createa a booking.
     *
     * @throws KatanoxException           There was an error mapping the API response to the model object
     * @throws HttpException              The HTTP request could not be completed
     * @throws MissingParametersException The query object does not have the minimum parameters set
     */
    public function createBooking(Booking $booking): CreateBookingResult
    {
        $booking->validate();
        $req = new KatanoxRequest(
            'POST',
            $this->baseUrl,
            $this->apiKey,
            $booking->toArray()
        );
        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            [],
            $req->getParams(),
            ['Content-Type' => 'application/json'],
        );

        try {
            $result = new CreateBookingResult();
            $response = json_decode((string) $res->getBody());

            $createSuccessful = 201 === $res->getStatusCode();

            $result->setIsCreated($createSuccessful);
            if ($createSuccessful) {
                $booking = $this->mapper->map($response->data->booking, new Booking());
                $result->setBooking($booking);
                $result->setLinks($response->links);
            } else {
                $result->setErrors($response->errors);
            }
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Unable to map the Katanox API response to the model object reason %s', $e->getMessage()));
        }

        return $result;
    }

    /**
     * Fetch a booking.
     *
     * @throws KatanoxException There was an error mapping the API response to the model object
     * @throws HttpException    The HTTP request could not be completed
     */
    public function getBooking(string $bookingId): GetBookingResult
    {
        $req = new KatanoxRequest(
            'GET',
            sprintf('%s/%s', $this->baseUrl, $bookingId),
            $this->apiKey,
            []
        );
        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        try {
            $response = json_decode((string) $res->getBody());
            $result = new GetBookingResult();

            $resourceExists = 200 === $res->getStatusCode();

            if ($resourceExists) {
                $booking = $this->mapper->map($response->data->booking, new Booking());
                $result->setBooking($booking);
                $result->setLinks($response->links);
            }
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Unable to map the Katanox API response to the model object reason %s', $e->getMessage()));
        }

        return $result;
    }

    /**
     * Cancel a booking and all associated reservations.
     *
     * @throws HttpException The HTTP request could not be completed
     *
     * @return bool If the booking has been cancelled
     */
    public function cancelBooking(string $bookingId): bool
    {
        $req = new KatanoxRequest(
            'DELETE',
            sprintf('%s/%s', $this->baseUrl, $bookingId),
            $this->apiKey,
            []
        );
        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        return 204 === $res->getStatusCode();
    }

    /**
     * Create a reservation.
     *
     * @throws MissingParametersException
     * @throws HttpException
     */
    public function createReservation(CreateReservationRequest $createReservationRequest): CreateReservationResult
    {
        $createReservationRequest->validate();
        $req = new KatanoxRequest(
            'POST',
            sprintf('%s/%s/reservations', $this->baseUrl, $createReservationRequest->getBookingId()),
            $this->apiKey,
            $createReservationRequest->getReservation()->toArray()
        );
        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        try {
            $result = new CreateReservationResult();
            $response = json_decode((string) $res->getBody());

            $createSuccesful = 201 === $res->getStatusCode();

            $result->setIsCreated($createSuccesful);
            if ($createSuccesful) {
                $reservation = $this->mapper->map($response->data->reservation, new Reservation());
                $result->setReservation($reservation);
                $result->setLinks($response->links);
            } else {
                $result->setErrors($response->errors);
            }
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Unable to map the Katanox API response to the model object reason %s', $e->getMessage()));
        }

        return $result;
    }

    /**
     * Update a reservation.
     *
     * @param UpdateReservationRequest $updateReservation
     *
     * @throws MissingParametersException
     * @throws HttpException
     */
    public function updateReservation(UpdateReservationRequest $updateReservationRequest): CreateReservationResult
    {
        $updateReservationRequest->validate();
        $url = sprintf(
            '%s/%s/reservations/%s',
            $this->baseUrl,
            $updateReservationRequest->getBookingId(),
            $updateReservationRequest->getReservation()->getId()
        );

        $req = new KatanoxRequest(
            'PUT',
            $url,
            $this->apiKey,
            $updateReservationRequest->getReservation()->toArray()
        );

        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            [],
            $req->getParams(),
            ['Content-Type' => 'application/json'],
        );

        try {
            $result = new CreateReservationResult();
            $response = json_decode((string) $res->getBody());

            $createSuccesful = 200 === $res->getStatusCode();

            $result->setIsCreated($createSuccesful);

            if ($createSuccesful) {
                $reservation = $this->mapper->map($response->data->reservation, new Reservation());
                $result->setReservation($reservation);
                $result->setLinks($response->links);
            } else {
                $result->setErrors($response->errors);
            }
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Unable to map the Katanox API response to the model object reason %s', $e->getMessage()));
        }

        return $result;
    }

    /**
     * Fetch a reservation.
     *
     * @throws KatanoxException There was an error mapping the API response to the model object
     * @throws HttpException    The HTTP request could not be completed
     */
    public function getReservation(string $bookingId, string $reservationId): GetReservationResult
    {
        $req = new KatanoxRequest(
            'GET',
            sprintf('%s/%s/reservations/%s', $this->baseUrl, $bookingId, $reservationId),
            $this->apiKey,
            []
        );
        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        try {
            $response = json_decode((string) $res->getBody());
            $result = new GetReservationResult();

            $resourceExists = 200 === $res->getStatusCode();

            if ($resourceExists) {
                $reservation = $this->mapper->map($response->data->reservation, new Reservation());
                $result->setReservation($reservation);
                $result->setLinks($response->links);
            }
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Unable to map the Katanox API response to the model object reason %s', $e->getMessage()));
        }

        return $result;
    }

    /**
     * Cancel a reservation.
     *
     * @throws HttpException The HTTP request could not be completed
     *
     * @return bool if the reservation has been cancelled
     */
    public function cancelReservation(string $bookingId, string $reservationId): bool
    {
        $req = new KatanoxRequest(
            'DELETE',
            sprintf('%s/%s/reservations/%s', $this->baseUrl, $bookingId, $reservationId),
            $this->apiKey,
            []
        );
        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        return 204 === $res->getStatusCode();
    }
}
