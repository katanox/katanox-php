<?php

namespace Katanox\Test;

use InvalidArgumentException;
use Katanox\Exceptions\MissingParametersException;
use Katanox\Model\Booking\Booking;
use Katanox\Model\Booking\Payment;
use Katanox\Model\Booking\Person;
use Katanox\Model\Booking\Reservation;
use Katanox\Model\Price;
use Katanox\Model\Request\CreateReservationRequest;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ModelTest extends TestCase
{
    public function testPersonValidateIsSuccess()
    {
        $person = new Person();

        $person->setFirstName('first_name');
        $person->setLastName('last_name');
        $person->setTitle('MR');

        $this->assertSame($person, $person->validate());
    }

    public function testPersonValidateThrowsMissingParametersException()
    {
        $person = new Person();

        $person->setFirstName('first_name');

        $this->expectException(MissingParametersException::class);
        $this->expectExceptionMessage('First, Last name and Title parameters are required for a person');
        $person->validate();
    }

    public function testPersonValidateThrowsMissingParametersExceptionMissingTitle()
    {
        $person = new Person();

        $person->setFirstName('first_name');
        $person->setFirstName('last_name');

        $this->expectException(MissingParametersException::class);
        $this->expectExceptionMessage('First, Last name and Title parameters are required for a person');
        $person->validate();
    }

    public function testPersonToArray()
    {
        $person = new Person();

        $person->setFirstName('first_name');
        $person->setLastName('last_name');
        $person->setTitle('MR');

        $personAsArray = $person->toArray();

        $this->assertArrayHasKey('first_name', $personAsArray);
        $this->assertArrayHasKey('last_name', $personAsArray);
        $this->assertArrayHasKey('title', $personAsArray);
        $this->assertEquals($person->getFirstName(), $personAsArray['first_name']);
        $this->assertEquals($person->getLastName(), $personAsArray['last_name']);
        $this->assertEquals($person->getTitle(), $personAsArray['title']);
    }

    public function testPaymentValidateSuccess()
    {
        $payment = $this->createPayment();

        $this->assertEquals($payment, $payment->validate());
    }

    public function testPaymentValidateThrowsMissingParametersException()
    {
        $payment = new Payment();
        $payment->setCardHolder('Holder');

        $this->expectException(MissingParametersException::class);
        $this->expectExceptionMessage('Required fields are: type, cardNumber, cvv, cardHolder, expiryMonth, expiryYear');

        $payment->validate();
    }

    public function testBookingValidateThrowsMissingParametersExceptionMissingFields()
    {
        $booking = new Booking();

        $this->expectException(MissingParametersException::class);
        $this->expectExceptionMessage('Invalid Booking.  Required fields are: total price, customer, payment, reservations.  Reservations must be > 0');

        $booking->validate();
    }

    public function testBookingValidateThrowsMissingParametersExceptionZeroResrvations()
    {
        $booking = new Booking();
        $booking->setTotalPrice(new Price(1.0, 'EUR'));
        $booking->setCustomer(new Person());
        $booking->setPayment(new Payment());

        $this->expectException(MissingParametersException::class);
        $this->expectExceptionMessage('Invalid Booking.  Required fields are: total price, customer, payment, reservations.  Reservations must be > 0');

        $booking->validate();
    }

    public function testBookingValidateThrowsMissingParametersExceptionInvalidPayment()
    {
        $booking = new Booking();
        $person = $this->createPerson();

        $booking->setTotalPrice(new Price(1.0, 'EUR'));
        $booking->setCustomer($person);
        $booking->setPayment(new Payment());
        $booking->setReservations([$this->createReservation()]);

        $this->expectException(MissingParametersException::class);
        $this->expectExceptionMessage('Invalid Payment.  Required fields are: type, cardNumber, cvv, cardHolder, expiryMonth, expiryYear');

        $booking->validate();
    }

    public function testBookingValidateThrowsMissingParametersExceptionInvalidCustomer()
    {
        $booking = new Booking();
        $person = new Person();
        $person->setFirstName('fisrtName');

        $booking->setTotalPrice(new Price(1.0, 'EUR'));
        $booking->setCustomer($person);
        $booking->setPayment($this->createPayment());
        $booking->setReservations([$this->createReservation()]);

        $this->expectException(MissingParametersException::class);
        $this->expectExceptionMessage('First, Last name and Title parameters are required for a person');
        $booking->validate();
    }

    public function testBookingValidateThrowsInvalidArgumentExceptionInvalidReservations()
    {
        $booking = new Booking();

        $booking->setTotalPrice(new Price(1.0, 'EUR'));
        $booking->setCustomer($this->createPerson());
        $booking->setPayment($this->createPayment());

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid reservations array.  Either empty or does not contain Reservation instances');

        $booking->setReservations([1]);
    }

    public function testBookingValidateSuccesful()
    {
        $booking = new Booking();

        $booking->setTotalPrice(new Price(1.0, 'EUR'));
        $booking->setCustomer($this->createPerson());
        $booking->setPayment($this->createPayment());
        $booking->setReservations([$this->createReservation()]);

        $this->assertEquals($booking, $booking->validate());
    }

    public function testReservationValidateThrowsMissingParameterException()
    {
        $reservation = new Reservation();

        $this->expectException(MissingParametersException::class);

        $this->expectExceptionMessage('Invalid Reservation.  Required fields are: guests, check in, check out, price, rate plan id, unit id, adults, children');
        $reservation->validate();
    }

    public function testReservationSetGuestsThrowsInvalidArgumentExceptionEmptyGuests()
    {
        $reservation = new Reservation();

        $reservation->setCheckIn('2020-02-20');
        $reservation->setCheckOut('2020-02-22');
        $reservation->setPrice(new Price(1.0, 'EUR'));
        $reservation->setRatePlanId(1);
        $reservation->setUnitId(1);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid guests array.  Either empty or does not contain Guest instances');
        $reservation->setGuests([]);
    }

    public function testReservationSetGuestsThrowsInvalidArgumentExceptionInvalidGuests()
    {
        $reservation = new Reservation();

        $reservation->setCheckIn('2020-02-20');
        $reservation->setCheckOut('2020-02-22');
        $reservation->setPrice(new Price(1.0, 'EUR'));
        $reservation->setRatePlanId(1);
        $reservation->setUnitId(1);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid guests array.  Either empty or does not contain Guest instances');
        $reservation->setGuests([1]);
    }

    public function testReservationValidateSucceful()
    {
        $reservation = new Reservation();

        $reservation->setCheckIn('2020-02-20');
        $reservation->setCheckOut('2020-02-22');
        $reservation->setPrice(new Price(1.0, 'EUR'));
        $reservation->setRatePlanId(1);
        $reservation->setUnitId(1);

        $guest = $this->createPerson();
        $reservation->setGuests([$guest]);

        $this->assertEquals($reservation, $reservation->validate());
    }

    public function testReservationToArray()
    {
        $reservation = $this->createReservation();

        $expectedResult = [
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
            'comments' => [],
        ];

        $this->assertEquals($expectedResult, $reservation->toArray());
    }

    public function testBookingToArray()
    {
        $booking = new Booking();
        $booking->setTotalPrice(new Price(1.0, 'EUR'));
        $booking->setCustomer($this->createPerson());
        $booking->setPayment($this->createPayment());
        $booking->setReservations([$this->createReservation()]);

        $expectedResult = [
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
                    'comments' => [],
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
        ];

        $this->assertEquals($expectedResult, $booking->toArray());
    }

    public function testCreateReservationRequestValidateErrorMissingBookingId()
    {
        $request = new CreateReservationRequest();
        $this->expectException(MissingParametersException::class);
        $this->expectExceptionMessage('Invalid CreateReservationRequest.  Required fields: booking id, reservation.');
        $request->validate();
    }

    public function testCreateReservationRequestValidateErrorMissingReservation()
    {
        $request = new CreateReservationRequest();
        $request->setBookingId('asdadsad');
        $this->expectException(MissingParametersException::class);
        $this->expectExceptionMessage('Invalid CreateReservationRequest.  Required fields: booking id, reservation.');
        $request->validate();
    }

    public function testCreateReservationRequestValidateSuccesful()
    {
        $request = new CreateReservationRequest();
        $request->setBookingId('asdadsad');
        $request->setReservation($this->createReservation());
        $this->assertEquals($request, $request->validate());
    }

    private function createPayment()
    {
        $payment = new Payment();
        $payment->setCardHolder('Holder');
        $payment->setCVV('111');
        $payment->setType('VISA');
        $payment->setExpiryMonth('08');
        $payment->setExpiryYear('2022');
        $payment->setCardNumber('11111111111111111111');

        return $payment;
    }

    private function createPerson()
    {
        $person = new Person();
        $person->setFirstName('fisrtName');
        $person->setLastName('lastName');
        $person->setTitle('Mr');
        $person->setBirthDate('2020-02-20');
        $person->setCity('Amsterdam');
        $person->setCountry('Netherlands');

        return $person;
    }

    private function createReservation()
    {
        $reservation = new Reservation();

        $guest = $this->createPerson();

        $reservation->setCheckIn('2020-02-20')
            ->setCheckOut('2020-02-22')
            ->setPrice(new Price(1.0, 'EUR'))
            ->setRatePlanId(1)
            ->setComments([])
            ->setUnitId(1)
            ->setGuests([$guest])
        ;

        return $reservation;
    }
}
