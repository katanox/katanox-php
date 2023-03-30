# Katanox\OfferApi

All URIs are relative to https://api.katanox.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**offerRefresh()**](OfferApi.md#offerRefresh) | **POST** /offers/{offer_id}/refresh | Refresh an offer |
| [**offerValidate()**](OfferApi.md#offerValidate) | **GET** /offers/{offer_id} | Retrieve an offer |


## `offerRefresh()`

```php
offerRefresh($offer_id, $authorization)
```

Refresh an offer

Refresh the expiry time of an active offer to extend its validity. If the offer has already expired or the price has changed, the endpoint will return a bad request.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\OfferApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$offer_id = 'offer_id_example'; // string | The id of the offer
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $apiInstance->offerRefresh($offer_id, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling OfferApi->offerRefresh: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offer_id** | **string**| The id of the offer | |
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

## `offerValidate()`

```php
offerValidate($offer_id, $authorization): \Katanox\Model\OfferGetOfferResponse
```

Retrieve an offer

Retrieve an offer by id. If the offer is expired, the endpoint will return a not found response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\OfferApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$offer_id = 'offer_id_example'; // string | The id of the offer
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $result = $apiInstance->offerValidate($offer_id, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OfferApi->offerValidate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offer_id** | **string**| The id of the offer | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\Katanox\Model\OfferGetOfferResponse**](../Model/OfferGetOfferResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
