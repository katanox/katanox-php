# OpenAPI\Client\BookingsApi

All URIs are relative to https://api.katanox.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelBookingById()**](BookingsApi.md#cancelBookingById) | **DELETE** /bookings/{booking_id} | Cancel a booking |
| [**cancelReservation()**](BookingsApi.md#cancelReservation) | **DELETE** /bookings/{booking_id}/reservations/{reservation_id} | Cancel a reservation |
| [**createBooking()**](BookingsApi.md#createBooking) | **POST** /bookings | Create a booking |
| [**createReservation()**](BookingsApi.md#createReservation) | **POST** /bookings/{booking_id}/reservations | Create a reservation |
| [**getBookingById()**](BookingsApi.md#getBookingById) | **GET** /bookings/{booking_id} | Retrieve a booking |
| [**getReservationById()**](BookingsApi.md#getReservationById) | **GET** /bookings/{booking_id}/reservations/{reservation_id} | Retrieve a reservation by id |
| [**updateReservation()**](BookingsApi.md#updateReservation) | **PUT** /bookings/{booking_id}/reservations/{reservation_id} | Update a reservation |


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



$apiInstance = new OpenAPI\Client\Api\BookingsApi(
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

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\BookingsApi(
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
createBooking($authorization, $booking): \OpenAPI\Client\Model\HttpBookingResponse
```

Create a booking

Using this endpoint, you can create a booking consisting of one or more reservations. Note that these reservations need to belong to the same property, but can contain any combination of rates/units of that property. Furthermore, the check-in date of the new reservation needs to be within the travel dates of the rest of the reservations in the booking. The booking object allows you to manage multiple reservations in a unified way while keeping the flexibility to modify individual reservations.  When this endpoint returns a successful response, it means that we accepted the booking and we are in the process of forwarding it to the hotels. Since some hotel systems are asynchronous, you need to retrieve the booking again using the id in the response and check if it was confirmed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token
$booking = new \OpenAPI\Client\Model\HttpBookingCreationRequest(); // \OpenAPI\Client\Model\HttpBookingCreationRequest | Booking body

try {
    $result = $apiInstance->createBooking($authorization, $booking);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BookingsApi->createBooking: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |
| **booking** | [**\OpenAPI\Client\Model\HttpBookingCreationRequest**](../Model/HttpBookingCreationRequest.md)| Booking body | |

### Return type

[**\OpenAPI\Client\Model\HttpBookingResponse**](../Model/HttpBookingResponse.md)

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
createReservation($booking_id, $authorization, $reservation): \OpenAPI\Client\Model\HttpReservationResponse
```

Create a reservation

When creating a new reservation, you must specify the booking id you want the new reservation to be part of. If there is no booking, use the Create a booking method instead.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The id of the booking
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token
$reservation = new \OpenAPI\Client\Model\HttpReservationCreationRequest(); // \OpenAPI\Client\Model\HttpReservationCreationRequest | Reservation body

try {
    $result = $apiInstance->createReservation($booking_id, $authorization, $reservation);
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
| **reservation** | [**\OpenAPI\Client\Model\HttpReservationCreationRequest**](../Model/HttpReservationCreationRequest.md)| Reservation body | |

### Return type

[**\OpenAPI\Client\Model\HttpReservationResponse**](../Model/HttpReservationResponse.md)

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
getBookingById($booking_id, $authorization): \OpenAPI\Client\Model\HttpBookingResponse
```

Retrieve a booking

Retrieve a specific booking with its current state. The specific booking id is supplied to you as part of the Post method response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\BookingsApi(
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

[**\OpenAPI\Client\Model\HttpBookingResponse**](../Model/HttpBookingResponse.md)

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
getReservationById($booking_id, $reservation_id, $authorization): \OpenAPI\Client\Model\HttpReservationResponse
```

Retrieve a reservation by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\BookingsApi(
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

[**\OpenAPI\Client\Model\HttpReservationResponse**](../Model/HttpReservationResponse.md)

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
updateReservation($booking_id, $reservation_id, $authorization, $reservation): \OpenAPI\Client\Model\HttpReservationResponse
```

Update a reservation

When updating a Reservation, send in the entire reservation with its desired state. Note that this is not a partial update - all fields, specified or not, will be persisted to the existing Reservation object.  To add an additional guest, update or delete an existing guest, send a guest list with the necessary changes. The list in the update reservation request will update the associated guests in that reservation. You can find more information in the [Reservation guide](https://docs.katanox.com/docs/reservartion)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\BookingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The id of the booking
$reservation_id = 'reservation_id_example'; // string | The id of the reservation
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token
$reservation = new \OpenAPI\Client\Model\HttpReservationUpdateRequest(); // \OpenAPI\Client\Model\HttpReservationUpdateRequest | The reservation body

try {
    $result = $apiInstance->updateReservation($booking_id, $reservation_id, $authorization, $reservation);
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
| **reservation** | [**\OpenAPI\Client\Model\HttpReservationUpdateRequest**](../Model/HttpReservationUpdateRequest.md)| The reservation body | |

### Return type

[**\OpenAPI\Client\Model\HttpReservationResponse**](../Model/HttpReservationResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
