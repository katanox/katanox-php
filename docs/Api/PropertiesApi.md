# OpenAPI\Client\PropertiesApi

All URIs are relative to https://api.katanox.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getProperties()**](PropertiesApi.md#getProperties) | **GET** /properties | Retrieve the list of contracted properties |
| [**getPropertyById()**](PropertiesApi.md#getPropertyById) | **GET** /properties/{id} | Retrieve a property by id |
| [**getRateplanById()**](PropertiesApi.md#getRateplanById) | **GET** /properties/{property_id}/rate-plans/{id} | Retrieve a rate plan by id |
| [**getUnitById()**](PropertiesApi.md#getUnitById) | **GET** /properties/{property_id}/units/{id} | Retrieve a unit by id |


## `getProperties()`

```php
getProperties($authorization, $property_ids): \OpenAPI\Client\Model\ModelGetPropertiesResponse
```

Retrieve the list of contracted properties

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\PropertiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token
$property_ids = array('property_ids_example'); // string[] | List of property IDs to be included. When specified, only these properties will be included in the response. The maximum size of this list is 50.

try {
    $result = $apiInstance->getProperties($authorization, $property_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PropertiesApi->getProperties: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |
| **property_ids** | [**string[]**](../Model/string.md)| List of property IDs to be included. When specified, only these properties will be included in the response. The maximum size of this list is 50. | [optional] |

### Return type

[**\OpenAPI\Client\Model\ModelGetPropertiesResponse**](../Model/ModelGetPropertiesResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPropertyById()`

```php
getPropertyById($id, $authorization): \OpenAPI\Client\Model\ModelGetPropertyByIdResponse
```

Retrieve a property by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\PropertiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 'id_example'; // string | The id of the property to retrieve
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $result = $apiInstance->getPropertyById($id, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PropertiesApi->getPropertyById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The id of the property to retrieve | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\OpenAPI\Client\Model\ModelGetPropertyByIdResponse**](../Model/ModelGetPropertyByIdResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRateplanById()`

```php
getRateplanById($property_id, $id, $authorization): \OpenAPI\Client\Model\ModelGetRatePlanByIdResponse
```

Retrieve a rate plan by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\PropertiesApi(
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
    echo 'Exception when calling PropertiesApi->getRateplanById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **property_id** | **string**| The id of the property | |
| **id** | **string**| The id of the rate plan | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\OpenAPI\Client\Model\ModelGetRatePlanByIdResponse**](../Model/ModelGetRatePlanByIdResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUnitById()`

```php
getUnitById($property_id, $id, $authorization): \OpenAPI\Client\Model\ModelGetUnitByIdResponse
```

Retrieve a unit by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\PropertiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$property_id = 'property_id_example'; // string | The id of the property
$id = 'id_example'; // string | The id of the unit
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token

try {
    $result = $apiInstance->getUnitById($property_id, $id, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PropertiesApi->getUnitById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **property_id** | **string**| The id of the property | |
| **id** | **string**| The id of the unit | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |

### Return type

[**\OpenAPI\Client\Model\ModelGetUnitByIdResponse**](../Model/ModelGetUnitByIdResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
