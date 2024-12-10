# Katanox\InvoiceApi

All URIs are relative to https://api-staging.katanox.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bookingsGetInvoices()**](InvoiceApi.md#bookingsGetInvoices) | **GET** /bookings/{booking_id}/invoices | Get folio data |
| [**getInvoiceFile()**](InvoiceApi.md#getInvoiceFile) | **GET** /bookings/{booking_id}/invoices/{invoice_id}/file | Get invoice |


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



$apiInstance = new Katanox\Api\InvoiceApi(
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
    echo 'Exception when calling InvoiceApi->bookingsGetInvoices: ', $e->getMessage(), PHP_EOL;
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

## `getInvoiceFile()`

```php
getInvoiceFile($booking_id, $invoice_id, $authorization): \Katanox\Model\GithubComKatanoxApiInternalInvoiceGetInvoiceFileResponse
```

Get invoice

This endpoint returns the original invoice file using the invoice id that is returned by the  [Get Booking Invoices](bookings-get-invoices). The response will contain a link that you can use to access the file. If the file is not yet available, a 404 status code will be returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\InvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$booking_id = 'booking_id_example'; // string | The id of the booking
$invoice_id = 'invoice_id_example'; // string | The id of the invoice
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $result = $apiInstance->getInvoiceFile($booking_id, $invoice_id, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoiceApi->getInvoiceFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **booking_id** | **string**| The id of the booking | |
| **invoice_id** | **string**| The id of the invoice | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\Katanox\Model\GithubComKatanoxApiInternalInvoiceGetInvoiceFileResponse**](../Model/GithubComKatanoxApiInternalInvoiceGetInvoiceFileResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
