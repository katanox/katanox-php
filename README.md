<p align="center">
  <img src="https://static.katanox.com/blog/icons/ktnx-logo-white-bg.png" />
</p>

# Katanox PHP SDK

Welcome to the official PHP SDK of the [Katanox API](https://docs.katanox.com). You can simply install the SDK using Composer and after providing your API key you can start calling the API. 

Make sure you create a Travel Seller account at the [Katanox Platform](https://app.katanox.com/register) first so that you can receive a sandbox API key.

## Install

Via Composer

``` bash
$ composer require katanox/katanox-php
```

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/Katanox/vendor/autoload.php');
```

## API Endpoints

All URIs are relative to *https://api.katanox.com/v2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AvailabilityApi* | [**getAvailableProperties**](docs/Api/AvailabilityApi.md#getavailableproperties) | **GET** /availability | Retrieve the list of available properties
*BookingsApi* | [**cancelBookingById**](docs/Api/BookingsApi.md#cancelbookingbyid) | **DELETE** /bookings/{booking_id} | Cancel a booking
*BookingsApi* | [**cancelReservation**](docs/Api/BookingsApi.md#cancelreservation) | **DELETE** /bookings/{booking_id}/reservations/{reservation_id} | Cancel a reservation
*BookingsApi* | [**createBooking**](docs/Api/BookingsApi.md#createbooking) | **POST** /bookings | Create a booking
*BookingsApi* | [**createReservation**](docs/Api/BookingsApi.md#createreservation) | **POST** /bookings/{booking_id}/reservations | Create a reservation
*BookingsApi* | [**getBookingById**](docs/Api/BookingsApi.md#getbookingbyid) | **GET** /bookings/{booking_id} | Retrieve a booking
*BookingsApi* | [**getReservationById**](docs/Api/BookingsApi.md#getreservationbyid) | **GET** /bookings/{booking_id}/reservations/{reservation_id} | Retrieve a reservation by id
*BookingsApi* | [**updateReservation**](docs/Api/BookingsApi.md#updatereservation) | **PUT** /bookings/{booking_id}/reservations/{reservation_id} | Update a reservation
*OfferApi* | [**offerRefresh**](docs/Api/OfferApi.md#offerrefresh) | **POST** /offers/{offer_id}/refresh | Refresh an offer
*OfferApi* | [**offerValidate**](docs/Api/OfferApi.md#offervalidate) | **GET** /offers/{offer_id} | Retrieve an offer
*PropertiesApi* | [**getProperties**](docs/Api/PropertiesApi.md#getproperties) | **GET** /properties | Retrieve the list of contracted properties
*PropertiesApi* | [**getPropertyById**](docs/Api/PropertiesApi.md#getpropertybyid) | **GET** /properties/{id} | Retrieve a property by id
*PropertiesApi* | [**getRateplanById**](docs/Api/PropertiesApi.md#getrateplanbyid) | **GET** /properties/{property_id}/rate-plans/{id} | Retrieve a rate plan by id
*PropertiesApi* | [**getUnitById**](docs/Api/PropertiesApi.md#getunitbyid) | **GET** /properties/{property_id}/units/{id} | Retrieve a unit by id

## Models

- [AvailabilityAvailabilityAndPrice](docs/Model/AvailabilityAvailabilityAndPrice.md)
- [AvailabilityExtraCharge](docs/Model/AvailabilityExtraCharge.md)
- [AvailabilityOffer](docs/Model/AvailabilityOffer.md)
- [AvailabilityPrice](docs/Model/AvailabilityPrice.md)
- [DtoAmenity](docs/Model/DtoAmenity.md)
- [DtoBedType](docs/Model/DtoBedType.md)
- [DtoCancellationPolicy](docs/Model/DtoCancellationPolicy.md)
- [DtoCreatedBooking](docs/Model/DtoCreatedBooking.md)
- [DtoCreatedReservation](docs/Model/DtoCreatedReservation.md)
- [DtoFacility](docs/Model/DtoFacility.md)
- [DtoI18NProperty](docs/Model/DtoI18NProperty.md)
- [DtoI18NRatePlan](docs/Model/DtoI18NRatePlan.md)
- [DtoI18NUnit](docs/Model/DtoI18NUnit.md)
- [DtoNoShowPolicy](docs/Model/DtoNoShowPolicy.md)
- [DtoPayment](docs/Model/DtoPayment.md)
- [DtoPerson](docs/Model/DtoPerson.md)
- [DtoPrice](docs/Model/DtoPrice.md)
- [DtoProperty](docs/Model/DtoProperty.md)
- [DtoPropertyImage](docs/Model/DtoPropertyImage.md)
- [DtoRatePlan](docs/Model/DtoRatePlan.md)
- [DtoRatePlanService](docs/Model/DtoRatePlanService.md)
- [DtoReservation](docs/Model/DtoReservation.md)
- [DtoUnit](docs/Model/DtoUnit.md)
- [DtoUnitImage](docs/Model/DtoUnitImage.md)
- [GeopointGeoPoint](docs/Model/GeopointGeoPoint.md)
- [HttpBookingAndReservationLinks](docs/Model/HttpBookingAndReservationLinks.md)
- [HttpBookingCreationRequest](docs/Model/HttpBookingCreationRequest.md)
- [HttpBookingData](docs/Model/HttpBookingData.md)
- [HttpBookingResponse](docs/Model/HttpBookingResponse.md)
- [HttpPayment](docs/Model/HttpPayment.md)
- [HttpPerson](docs/Model/HttpPerson.md)
- [HttpReservationCreationRequest](docs/Model/HttpReservationCreationRequest.md)
- [HttpReservationData](docs/Model/HttpReservationData.md)
- [HttpReservationResponse](docs/Model/HttpReservationResponse.md)
- [HttpReservationUpdateRequest](docs/Model/HttpReservationUpdateRequest.md)
- [ModelAmenity](docs/Model/ModelAmenity.md)
- [ModelApiError](docs/Model/ModelApiError.md)
- [ModelBedType](docs/Model/ModelBedType.md)
- [ModelGetAvailabilityResponse](docs/Model/ModelGetAvailabilityResponse.md)
- [ModelGetPropertiesResponse](docs/Model/ModelGetPropertiesResponse.md)
- [ModelGetPropertyByIdResponse](docs/Model/ModelGetPropertyByIdResponse.md)
- [ModelGetRatePlanByIdResponse](docs/Model/ModelGetRatePlanByIdResponse.md)
- [ModelGetUnitByIdResponse](docs/Model/ModelGetUnitByIdResponse.md)
- [ModelI18NUnit](docs/Model/ModelI18NUnit.md)
- [ModelInternalServerError](docs/Model/ModelInternalServerError.md)
- [ModelLink](docs/Model/ModelLink.md)
- [ModelOffersData](docs/Model/ModelOffersData.md)
- [ModelPage](docs/Model/ModelPage.md)
- [ModelPropertiesData](docs/Model/ModelPropertiesData.md)
- [ModelPropertiesMeta](docs/Model/ModelPropertiesMeta.md)
- [ModelPropertyData](docs/Model/ModelPropertyData.md)
- [ModelUnit](docs/Model/ModelUnit.md)
- [ModelUnitImage](docs/Model/ModelUnitImage.md)
- [OfferGetOfferResponse](docs/Model/OfferGetOfferResponse.md)

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `2.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
