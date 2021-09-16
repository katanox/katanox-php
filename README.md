<p align="center">
  <img src="https://static.katanox.com/blog/icons/ktnx-logo-white-bg.png" />
</p>

# Katanox PHP SDK
![test workflow](https://github.com/katanox/katanox-php/actions/workflows/test.yaml/badge.svg)
![StyleCI](https://github.styleci.io/repos/397629408/shield?branch=master)


Welcome to the official PHP SDK of the [Katanox API](https://docs.katanox.com). You can simply install the SDK using Composer and after providing your API key you can start calling the API. 

Make sure you create a Travel Seller account at the [Katanox Platform](https://app.katanox.com/register) first so that you can receive a sandbox API key.

## Install

Via Composer

``` bash
$ composer require katanox/katanox-php
```

## Documentation

### Setup
First create a KatanoxApi Object
```php 
$katanox = new Katanox\KatanoxApi('your-api-key-here');
```
### Get Availability
``` php
$availabilityResource = $katanox->getAvailabilityResource();

$q = new AvailabilityQuery();
$q->setLat(52.0356)
    ->setLng(4.0913)
    ->setRadius(2000)
    ->setAdults(1)
    ->setChildren(0)
    ->setCheckIn('2021-07-01')
    ->setCheckOut('2021-07-02')
    ->setPage(1)
    ->setLimit(25);

// Get the first page    
$response = $availabilityResource->search($q);
$properties = $response->getData()->getProperties();

// Get the next page
$nextPage = $availabilityResource->next($response);
$properties = $nextPage->getData()->getProperties();

```
### Create a new booking
``` php
$bookingResource = $katanox->getBookingResource();

$booking = new Booking();

$person = new Person();
$person->setFirstName('fisrtName')
->setLastName('lastName')
->setTitle('Mr')
->setBirthDate('2020-02-20')
->setCity('Amsterdam')
->setCountry('Netherlands');

$payment = new Payment();
$payment->setCardHolder('Holder')
->setCVV('111')
->setType('VISA')
->setExpirtyMonth('08')
->setExpiryYear('22')
->setCardNumber('11111111111111111111');

$reservation = new Reservation();
$reservation->setCheckIn('2020-02-20')
->setCheckOut('2020-02-22')
->setPrice(new Price(1.0, 'EUR'))
->setRatePlanId('ABCDEFGE')
->setUnitId('TRCDNHGE')
->setGuests([$person]);

$booking->setTotalPrice(1.0)
->setPayment($payment)
->setReservations([$reservation]);


$createBookingResult = $bookingResource->createBooking($booking);

// Getting the new booking 
$newBooking = $createBookingResult->getBooking();
```

### Get a booking
``` php
$bookingResource = $katanox->getBookingResource();

$booking = $bookingResource->getBooking('<BOOKING_ID>');
```

### Cancel a booking
``` php
$bookingResource = $katanox->getBookingResource();

$isCancelled = $bookingResource->cancelBooking('<BOOKING_ID>');
```

### Create a reservation
``` php
$bookingResource = $katanox->getBookingResource();

$createReservationRequest = new CreateReservationRequest();

$person = new Person();
$person->setFirstName('firstName')
->setLastName('lastName')
->setTitle('Mr')
->setBirthDate('2020-02-20')
->setCity('Amsterdam')
->setCountry('Netherlands');

$reservation = new Reservation();
$reservation->setCheckIn('2020-02-20')
->setCheckOut('2020-02-22')
->setPrice(new Price(1.0, 'EUR'))
->setRatePlanId('ABCDEFGE')
->setUnitId('TRCDNHGE')
->setGuests([$person]);

$createReservationRequest->setReservation($reservation)
->setBookingId('<BOOKING_ID>');

$createReservationResult = $bookingResource->createReservation($createReservationRequest);

// Getting the new reservation
$newReservation = $createReservationResult->getReservation();
```

### Update a reservation
``` php
$bookingResource = $katanox->getBookingResource();

$updateReservation = new UpdateReservationRequest();


// update the reservation
$updateReservationRequest->setReservation($reservation);
$updateReservationRequest->setBookingId('<BOOKING_ID>');

$updateReservationResult = $bookingResource->updateReservation($updateReservationRequestt);

// Getting the new reservation
$updatedReservation = $updateReservationResult->getReservation();
```

You can ensure if a booking/reservation was created with:
`$result->isCreated();`

### Get a reservation
``` php
$bookingResource = $katanox->getBookingResource();

$reservation = $bookingResource->getReservation('<BOOKING_ID>','<RESERVATION_ID>');
```

### Cancel a reservation
``` php
$bookingResource = $katanox->getBookingResource();

$isCancelled = $bookingResource->cancelReservation('<BOOKING_ID>','<RESERVATION_ID>');
```

### Get connected properties
``` php
$propertyResource = $katanox->getPropertyResource();

$properties = $propertyResource->getProperties();
```
These are the properties you are connected with.

### Get a property
``` php
$propertyResource = $katanox->getPropertyResource();

$property= $propertyResource->getProperty('<PROPERTY_ID>');
```

### Get a property 
``` php
$propertyResource = $katanox->getPropertyResource();

$property= $propertyResource->getProperty('<PROPERTY_ID>');
```

### Get a property unit
``` php
$propertyResource = $katanox->getPropertyResource();

$unit = $propertyResource->getUnit('<PROPERTY_ID>', '<UNIT_ID>');
```

### Get a property rate plan
``` php
$propertyResource = $katanox->getPropertyResource();

$ratePlan = $propertyResource->getRatePlan('<PROPERTY_ID>', '<RATE_PLAN_ID>');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email the Katanox Engineering Team (developers@katanox.com) instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
