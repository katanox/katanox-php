# Katanox\BookingsApi

All URIs are relative to https://api.katanox.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bookingsGetInvoices()**](BookingsApi.md#bookingsGetInvoices) | **GET** /bookings/{booking_id}/invoices | Get folio data |
| [**cancelBookingById()**](BookingsApi.md#cancelBookingById) | **DELETE** /bookings/{booking_id} | Cancel a booking |
| [**cancelReservation()**](BookingsApi.md#cancelReservation) | **DELETE** /bookings/{booking_id}/reservations/{reservation_id} | Cancel a reservation |
| [**createBooking()**](BookingsApi.md#createBooking) | **POST** /bookings | Create a booking |
| [**createReservation()**](BookingsApi.md#createReservation) | **POST** /bookings/{booking_id}/reservations | Create a reservation |
| [**getBookingById()**](BookingsApi.md#getBookingById) | **GET** /bookings/{booking_id} | Retrieve a booking |
| [**getReservationById()**](BookingsApi.md#getReservationById) | **GET** /bookings/{booking_id}/reservations/{reservation_id} | Retrieve a reservation by id |
| [**updateReservation()**](BookingsApi.md#updateReservation) | **PUT** /bookings/{booking_id}/reservations/{reservation_id} | Update a reservation |


## `bookingsGetInvoices()`

```php
bookingsGetInvoices($booking_id, $authorization): \Katanox\Model\InvoiceGetBookingInvoiceResponse
```

Get folio data

Returns invoice details of a booking.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The id of the booking
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $result = $apiInstance->bookingsGetInvoices($booking_id, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BookingsApi->bookingsGetInvoices: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **booking_id** | **string**| The id of the booking | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\Katanox\Model\InvoiceGetBookingInvoiceResponse**](../Model/InvoiceGetBookingInvoiceResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cancelBookingById()`

```php
cancelBookingById($booking_id, $authorization)
```

Cancel a booking

By canceling a booking, you are canceling all the reservations in it.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The id of the booking to be cancelled
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $apiInstance->cancelBookingById($booking_id, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling BookingsApi->cancelBookingById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **booking_id** | **string**| The id of the booking to be cancelled | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cancelReservation()`

```php
cancelReservation($booking_id, $reservation_id, $authorization)
```

Cancel a reservation

Using this endpoint you can submit a reservation cancellation request. If the reservation can be cancelled, the endpoint will return 204 and an empty response body. If we cannot start the cancellation process, the endpoint will return an error message and error codes. Currently the following error codes can be returned: `NON_CANCELLABLE`, `NOT_FOUND`, `INTERNAL_SERVER_ERROR` Each error code will have an error message to explain the error code. `NON_CANCELLABLE` reservations are the ones that either have non cancellable status (e.g `CANCELLED`, `PENDING`) or their check in date has already passed and the reservation cannot be cancelled any more. It's important to fetch the status of the reservation after submitting this request to confirm that the status changes to `CANCELLED`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The id of the booking
$reservation_id = 'reservation_id_example'; // string | The id of the reservation
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $apiInstance->cancelReservation($booking_id, $reservation_id, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling BookingsApi->cancelReservation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **booking_id** | **string**| The id of the booking | |
| **reservation_id** | **string**| The id of the reservation | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createBooking()`

```php
createBooking($authorization, $http_booking_creation_request): \Katanox\Model\HttpBookingResponse
```
### URI(s):
- https://api.katanox.com/v2 
Create a booking

Using this endpoint, you can create a booking consisting of one or more reservations. Note that these reservations need to belong to the same property, but can contain any combination of rates/units of that property. Furthermore, the check-in date of the new reservation needs to be within the travel dates of the rest of the reservations in the booking. The booking object allows you to manage multiple reservations in a unified way while keeping the flexibility to modify individual reservations.  When this endpoint returns a successful response, it means that we accepted the booking and we are in the process of forwarding it to the hotels. Since some hotel systems are asynchronous, you need to retrieve the booking again using the id in the response and check if it was confirmed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token
$http_booking_creation_request = new \Katanox\Model\HttpBookingCreationRequest(); // \Katanox\Model\HttpBookingCreationRequest | Booking body

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createBooking($authorization, $http_booking_creation_request, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BookingsApi->createBooking: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |
| **http_booking_creation_request** | [**\Katanox\Model\HttpBookingCreationRequest**](../Model/HttpBookingCreationRequest.md)| Booking body | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Katanox\Model\HttpBookingResponse**](../Model/HttpBookingResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createReservation()`

```php
createReservation($booking_id, $authorization, $http_reservation_creation_request): \Katanox\Model\HttpReservationResponse
```

Create a reservation

When creating a new reservation, you must specify the booking id you want the new reservation to be part of. If there is no booking, use the Create a booking method instead.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The id of the booking
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token
$http_reservation_creation_request = new \Katanox\Model\HttpReservationCreationRequest(); // \Katanox\Model\HttpReservationCreationRequest | Reservation body

try {
    $result = $apiInstance->createReservation($booking_id, $authorization, $http_reservation_creation_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BookingsApi->createReservation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **booking_id** | **string**| The id of the booking | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |
| **http_reservation_creation_request** | [**\Katanox\Model\HttpReservationCreationRequest**](../Model/HttpReservationCreationRequest.md)| Reservation body | |

### Return type

[**\Katanox\Model\HttpReservationResponse**](../Model/HttpReservationResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBookingById()`

```php
getBookingById($booking_id, $authorization): \Katanox\Model\HttpBookingResponse
```

Retrieve a booking

Retrieve a specific booking with its current state. The specific booking id is supplied to you as part of the Post method response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The ID of the booking
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $result = $apiInstance->getBookingById($booking_id, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BookingsApi->getBookingById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **booking_id** | **string**| The ID of the booking | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\Katanox\Model\HttpBookingResponse**](../Model/HttpBookingResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReservationById()`

```php
getReservationById($booking_id, $reservation_id, $authorization): \Katanox\Model\HttpReservationResponse
```

Retrieve a reservation by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The ID of the booking
$reservation_id = 'reservation_id_example'; // string | The ID of the reservation
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $result = $apiInstance->getReservationById($booking_id, $reservation_id, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BookingsApi->getReservationById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **booking_id** | **string**| The ID of the booking | |
| **reservation_id** | **string**| The ID of the reservation | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\Katanox\Model\HttpReservationResponse**](../Model/HttpReservationResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateReservation()`

```php
updateReservation($booking_id, $reservation_id, $authorization, $http_reservation_update_request): \Katanox\Model\HttpReservationResponse
```

Update a reservation

When updating a Reservation, send in the entire reservation with its desired state. Note that this is not a partial update - all fields, specified or not, will be persisted to the existing Reservation object.  To add an additional guest, update or delete an existing guest, send a guest list with the necessary changes. The list in the update reservation request will update the associated guests in that reservation. You can find more information in the [Reservation guide](https://docs.katanox.com/docs/reservation)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The id of the booking
$reservation_id = 'reservation_id_example'; // string | The id of the reservation
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token
$http_reservation_update_request = new \Katanox\Model\HttpReservationUpdateRequest(); // \Katanox\Model\HttpReservationUpdateRequest | The reservation body

try {
    $result = $apiInstance->updateReservation($booking_id, $reservation_id, $authorization, $http_reservation_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BookingsApi->updateReservation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **booking_id** | **string**| The id of the booking | |
| **reservation_id** | **string**| The id of the reservation | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |
| **http_reservation_update_request** | [**\Katanox\Model\HttpReservationUpdateRequest**](../Model/HttpReservationUpdateRequest.md)| The reservation body | |

### Return type

[**\Katanox\Model\HttpReservationResponse**](../Model/HttpReservationResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
