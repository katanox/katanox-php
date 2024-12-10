# Katanox\RatePlansApi

All URIs are relative to https://api-staging.katanox.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getRateplanById()**](RatePlansApi.md#getRateplanById) | **GET** /properties/{property_id}/rate-plans/{id} | Retrieve a rate plan by id |
| [**getRateplans()**](RatePlansApi.md#getRateplans) | **GET** /rate-plans | Retrieve the list of rate plans |


## `getRateplanById()`

```php
getRateplanById($property_id, $id, $authorization): \Katanox\Model\ModelGetRatePlanByIdResponse
```

Retrieve a rate plan by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\RatePlansApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$property_id = 'property_id_example'; // string | The id of the property
$id = 'id_example'; // string | The id of the rate plan
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $result = $apiInstance->getRateplanById($property_id, $id, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RatePlansApi->getRateplanById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **property_id** | **string**| The id of the property | |
| **id** | **string**| The id of the rate plan | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\Katanox\Model\ModelGetRatePlanByIdResponse**](../Model/ModelGetRatePlanByIdResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRateplans()`

```php
getRateplans($ids, $authorization): \Katanox\Model\ModelGetRatePlansResponse
```

Retrieve the list of rate plans

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\RatePlansApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$ids = array('ids_example'); // string[] | List of rate plan IDs to be included. The maximum size of this list is 50.
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $result = $apiInstance->getRateplans($ids, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RatePlansApi->getRateplans: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ids** | [**string[]**](../Model/string.md)| List of rate plan IDs to be included. The maximum size of this list is 50. | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\Katanox\Model\ModelGetRatePlansResponse**](../Model/ModelGetRatePlansResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
