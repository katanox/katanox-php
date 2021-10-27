<?php

namespace Katanox\Resource;

use GuzzleHttp\Psr7\Response;
use Katanox\Exceptions\HttpException;
use Katanox\Exceptions\KatanoxException;
use Katanox\Exceptions\MissingParametersException;
use Katanox\Http\Client;
use Katanox\Model\Booking\Booking;
use Katanox\Model\Booking\Payment;
use Katanox\Model\Booking\Person;
use Katanox\Model\Booking\Reservation;
use Katanox\Model\Price;
use Katanox\Model\Request\CreateReservationRequest;
use Katanox\Model\Request\UpdateReservationRequest;
use PHPUnit\Framework\TestCase;

/**
 * @property BookingResource  availabilityResource
 *
 * @internal
 * @coversNothing
 */
class BookingResourceTest extends TestCase
{
    private $bookingResource;
    private $mockHttpClient;

    public function setUp(): void
    {
        $this->mockHttpClient = \Mockery::mock(Client::class);
        $this->bookingResource = new BookingResource($this->mockHttpClient, 'abc');
    }

    /**
     * @throws MissingParametersException
     * @throws HttpException
     * @throws KatanoxException
     */
    public function testSuccesfulCreateBooking()
    {
        $links = [
            'get' => [
                'method' => 'GET',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE',
            ],
            'cancel' => [
                'method' => 'DELETE',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE',
            ],
        ];

        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'POST',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings',
                'abc',
                [],
                [
                    'total_price' => ['amount' => 1.0, 'currency' => 'EUR'],
                    'customer' => [
                        'last_name' => 'lastName',
                        'first_name' => 'fisrtName',
                        'title' => 'Mr',
                        'birth_date' => '2020-02-20',
                        'postcode' => null,
                        'city' => 'Amsterdam',
                        'country' => 'Netherlands',
                        'email' => null,
                        'phone_number' => null,
                    ],
                    'reservations' => [
                        [
                            'guests' => [
                                [
                                    'last_name' => 'lastName',
                                    'first_name' => 'fisrtName',
                                    'title' => 'Mr',
                                    'birth_date' => '2020-02-20',
                                    'postcode' => null,
                                    'city' => 'Amsterdam',
                                    'country' => 'Netherlands',
                                    'email' => null,
                                    'phone_number' => null,
                                ],
                            ],
                            'check_in' => '2020-02-20',
                            'check_out' => '2020-02-22',
                            'price' => ['amount' => 1.0, 'currency' => 'EUR'],
                            'rate_plan_id' => '1',
                            'unit_id' => '1',
                            'adults' => 0,
                            'children' => 0,
                        ],
                    ],
                    'comments' => [],
                    'payment' => [
                        'type' => 'VISA',
                        'card_number' => '11111111111111111111',
                        'cvv' => '111',
                        'card_holder' => 'Holder',
                        'expiry_month' => '08',
                        'expiry_year' => '2022',
                    ],
                ],
                ['Content-Type' => 'application/json']
            ])
            ->andReturn(
                new Response(
                    201,
                    [],
                    json_encode(['data' => ['booking' => $this->buildBooking()], 'links' => $links])
                )
            )
                             ;
        $booking = new Booking();
        $booking->setTotalPrice(new Price(1.0, 'EUR'))
            ->setCustomer($this->createPerson())
            ->setPayment($this->createPayment())
            ->setReservations([$this->createReservation()]);
        $res = $this->bookingResource->createBooking($booking);

        $this->assertTrue($res->isCreated());
        $this->assertInstanceOf(Booking::class, $res->getBooking());
        $this->assertEquals('ABCDE', $res->getBooking()->getId());
        $this->assertCount(1, $res->getBooking()->getReservations());
        $this->assertEquals(1.0, $res->getBooking()->getTotalPrice()->getAmount());
        $this->assertEquals('fisrtName', $res->getBooking()->getCustomer()->getFirstName());
    }

    public function testMissingBookingParametersException()
    {
        $this->expectException(MissingParametersException::class);
        $booking = new Booking();
        $this->bookingResource->createBooking($booking);
    }

    public function testCreateBookingUnsuccesfulResponse()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'POST',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings',
                'abc',
                [],
                [
                    'total_price' => ['amount' => 1.0, 'currency' => 'EUR'],
                    'customer' => [
                        'last_name' => 'lastName',
                        'first_name' => 'fisrtName',
                        'title' => 'Mr',
                        'birth_date' => '2020-02-20',
                        'postcode' => null,
                        'city' => 'Amsterdam',
                        'country' => 'Netherlands',
                        'email' => null,
                        'phone_number' => null,
                    ],
                    'reservations' => [
                        [
                            'guests' => [
                                [
                                    'last_name' => 'lastName',
                                    'first_name' => 'fisrtName',
                                    'title' => 'Mr',
                                    'birth_date' => '2020-02-20',
                                    'postcode' => null,
                                    'city' => 'Amsterdam',
                                    'country' => 'Netherlands',
                                    'email' => null,
                                    'phone_number' => null,
                                ],
                            ],
                            'check_in' => '2020-02-20',
                            'check_out' => '2020-02-22',
                            'price' => ['amount' => 1.0, 'currency' => 'EUR'],
                            'rate_plan_id' => '1',
                            'unit_id' => '1',
                            'adults' => 0,
                            'children' => 0,
                        ],
                    ],
                    'comments' => [],
                    'payment' => [
                        'type' => 'VISA',
                        'card_number' => '11111111111111111111',
                        'cvv' => '111',
                        'card_holder' => 'Holder',
                        'expiry_month' => '08',
                        'expiry_year' => '2022',
                    ],
                ],
                ['Content-Type' => 'application/json']
            ])
            ->andReturn(
                new Response(
                    422,
                    [],
                    json_encode(['errors' => 'rate plan does not exist'])
                )
            )
                             ;
        $booking = new Booking();
        $booking->setTotalPrice(new Price(1.0, 'EUR'));
        $booking->setCustomer($this->createPerson());
        $booking->setPayment($this->createPayment());
        $booking->setReservations([$this->createReservation()]);
        $res = $this->bookingResource->createBooking($booking);

        $this->assertFalse($res->isCreated());
        $this->assertNull($res->getBooking());
        $this->assertEquals('rate plan does not exist', $res->getErrors());
    }

    public function testFetchBookingSuccess()
    {
        $links = [
            'get' => [
                'method' => 'GET',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE',
            ],
            'cancel' => [
                'method' => 'DELETE',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE',
            ],
        ];
        $booking = $this->buildBooking();

        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    200,
                    [],
                    json_encode(['data' => ['booking' => $booking], 'links' => $links])
                )
            )
                             ;

        $res = $this->bookingResource->getBooking('ABCDE');

        $this->assertInstanceOf(Booking::class, $res->getBooking());
        $this->assertEquals('ABCDE', $res->getBooking()->getId());
        $this->assertCount(1, $res->getBooking()->getReservations());
        $this->assertEquals(['amount' => 1.0, 'currency' => 'EUR'], $res->getBooking()->getTotalPrice()->toArray());
        $this->assertEquals('fisrtName', $res->getBooking()->getCustomer()->getFirstName());
    }

    public function testFetchBookingNotFound()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    404,
                    []
                )
            )
                             ;

        $res = $this->bookingResource->getBooking('ABCDE');

        $this->assertNull($res->getBooking());
    }

    public function testCancelBookingSuccesful()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'DELETE',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    204,
                    []
                )
            )
                             ;

        $this->assertTrue($this->bookingResource->cancelBooking('ABCDE'));
    }

    public function testCancelBookingNotFound()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'DELETE',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    404,
                    []
                )
            )
                             ;

        $this->assertFalse($this->bookingResource->cancelBooking('ABCDE'));
    }

    public function testCreateReservationSuccesful()
    {
        $links = [
            'get' => [
                'method' => 'GET',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE/reservations/ABCDE',
            ],
            'cancel' => [
                'method' => 'DELETE',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE/reservations/ABCDE',
            ],
        ];
        $reservation = $this->createReservation();

        $reservationWithId = $this->createReservation();
        $reservationWithId->setId('ABCDE');

        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'POST',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE/reservations',
                'abc',
                [
                    'guests' => [
                        [
                            'last_name' => 'lastName',
                            'first_name' => 'fisrtName',
                            'title' => 'Mr',
                            'birth_date' => '2020-02-20',
                            'postcode' => null,
                            'city' => 'Amsterdam',
                            'country' => 'Netherlands',
                            'email' => null,
                            'phone_number' => null,
                        ],
                    ],
                    'check_in' => '2020-02-20',
                    'check_out' => '2020-02-22',
                    'price' => ['amount' => 1.0, 'currency' => 'EUR'],
                    'rate_plan_id' => '1',
                    'unit_id' => '1',
                    'adults' => 0,
                    'children' => 0,
                ],
            ])
            ->andReturn(
                new Response(
                    201,
                    [],
                    json_encode(['data' => ['reservation' => $reservationWithId], 'links' => $links])
                )
            )
                             ;
        $createReservationRequest = new CreateReservationRequest();
        $createReservationRequest->setBookingId('ABCDE');
        $createReservationRequest->setReservation($reservation);

        $res = $this->bookingResource->createReservation($createReservationRequest);

        $this->assertTrue($res->isCreated());
        $this->assertInstanceOf(Reservation::class, $res->getReservation());
        $this->assertEquals('ABCDE', $res->getReservation()->getId());
        $this->assertEquals('2020-02-20', $res->getReservation()->getCheckIn());
        $this->assertEquals('2020-02-22', $res->getReservation()->getCheckout());
        $this->assertEquals('1', $res->getReservation()->getUnitId());
        $this->assertEquals('1', $res->getReservation()->getRatePlanId());
    }

    public function testUpdateReservationSuccesful()
    {
        $links = [
            'get' => [
                'method' => 'GET',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE/reservations/ABCDE',
            ],
            'cancel' => [
                'method' => 'DELETE',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE/reservations/ABCDE',
            ],
        ];

        $reservation = $this->createReservation();
        $reservation->setId('ABCDE');

        $updatedReservation = $this->createReservation();
        $updatedReservation->setId('ABCDE');
        $updatedReservation->setCheckOut('2020-02-25');
        $updatedReservation->setRatePlanId('2');

        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'PUT',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE/reservations/ABCDE',
                'abc',
                [
                    'guests' => [
                        [
                            'last_name' => 'lastName',
                            'first_name' => 'fisrtName',
                            'title' => 'Mr',
                            'birth_date' => '2020-02-20',
                            'postcode' => null,
                            'city' => 'Amsterdam',
                            'country' => 'Netherlands',
                            'email' => null,
                            'phone_number' => null,
                        ],
                    ],
                    'check_in' => '2020-02-20',
                    'check_out' => '2020-02-22',
                    'price' => ['amount' => 1.0, 'currency' => 'EUR'],
                    'rate_plan_id' => '1',
                    'unit_id' => '1',
                    'adults' => 0,
                    'children' => 0,
                    'id' => 'ABCDE',
                ],
            ])
            ->andReturn(
                new Response(
                    200,
                    [],
                    json_encode(['data' => ['reservation' => $updatedReservation], 'links' => $links])
                )
            )
                             ;
        $updateReservationRequest = new UpdateReservationRequest();
        $updateReservationRequest->setBookingId('ABCDE');
        $updateReservationRequest->setReservation($reservation);

        $res = $this->bookingResource->updateReservation($updateReservationRequest);

        $this->assertTrue($res->isCreated());
        $this->assertInstanceOf(Reservation::class, $res->getReservation());
        $this->assertEquals($updateReservationRequest->getReservation()->getId(), $res->getReservation()->getId());
        $this->assertEquals('2020-02-20', $res->getReservation()->getCheckIn());
        $this->assertEquals('2020-02-25', $res->getReservation()->getCheckout());
        $this->assertEquals('1', $res->getReservation()->getUnitId());
        $this->assertEquals('2', $res->getReservation()->getRatePlanId());
    }

    public function testFetchResrvationSuccess()
    {
        $links = [
            'get' => [
                'method' => 'GET',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE/reservations/ABCDE',
            ],
            'cancel' => [
                'method' => 'DELETE',
                'url' => 'https =>//api.katanox.com/v1/bookings/ABCDE/reservations/ABCDE',
            ],
        ];
        $reservation = $this->createReservation();
        $reservation->setId('ABCDE');

        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE/reservations/ABCDE',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    200,
                    [],
                    json_encode(['data' => ['reservation' => $reservation], 'links' => $links])
                )
            )
                             ;

        $res = $this->bookingResource->getReservation('ABCDE', 'ABCDE');

        $this->assertInstanceOf(Reservation::class, $res->getReservation());
        $this->assertEquals('ABCDE', $res->getReservation()->getId());
        $this->assertEquals('2020-02-20', $res->getReservation()->getCheckIn());
        $this->assertEquals('2020-02-22', $res->getReservation()->getCheckout());
        $this->assertEquals('1', $res->getReservation()->getUnitId());
        $this->assertEquals('1', $res->getReservation()->getRatePlanId());
    }

    public function testFetchResrvationNotFound()
    {
        $reservation = $this->createReservation();
        $reservation->setId('ABCDE');

        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE/reservations/ABCDE',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    404,
                    [],
                    null
                )
            )
                             ;

        $res = $this->bookingResource->getReservation('ABCDE', 'ABCDE');

        $this->assertNull($res->getReservation());
    }

    public function testCancelReservationSuccesful()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'DELETE',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE/reservations/ABCDE',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    204,
                    []
                )
            )
                             ;

        $this->assertTrue($this->bookingResource->cancelReservation('ABCDE', 'ABCDE'));
    }

    public function testCancelReservationNotFound()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'DELETE',
                'https://api.pci-proxy.com/v1/push/5775c7cf3b3e5dc0/v1/bookings/ABCDE/reservations/ABCDE',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    404,
                    []
                )
            )
                             ;

        $this->assertFalse($this->bookingResource->cancelReservation('ABCDE', 'ABCDE'));
    }

    private function buildBooking()
    {
        $booking = new Booking();
        $booking->setTotalPrice(new Price(1.0, 'EUR'))
            ->setCustomer($this->createPerson())
            ->setPayment($this->createPayment())
            ->setReservations([$this->createReservation()])
            ->setId('ABCDE')
        ;

        return $booking;
    }

    private function createPayment()
    {
        $payment = new Payment();
        $payment->setCardHolder('Holder')
            ->setCVV('111')
            ->setType('VISA')
            ->setExpiryMonth('08')
            ->setExpiryYear('2022')
            ->setCardNumber('11111111111111111111')
        ;

        return $payment;
    }

    private function createPerson()
    {
        $person = new Person();
        $person->setFirstName('fisrtName')
            ->setLastName('lastName')
            ->setTitle('Mr')
            ->setBirthDate('2020-02-20')
            ->setCity('Amsterdam')
            ->setCountry('Netherlands')
        ;

        return $person;
    }

    private function createReservation()
    {
        $reservation = new Reservation();

        $reservation->setCheckIn('2020-02-20')
            ->setCheckOut('2020-02-22')
            ->setPrice(new Price(1.0, 'EUR'))
            ->setRatePlanId(1)
            ->setUnitId(1)
        ;

        $guest = $this->createPerson();
        $reservation->setGuests([$guest]);

        return $reservation;
    }
}
