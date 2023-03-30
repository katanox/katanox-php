# Katanox\AvailabilityApi

All URIs are relative to https://api.katanox.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAvailableProperties()**](AvailabilityApi.md#getAvailableProperties) | **GET** /availability | Retrieve the list of available properties |


## `getAvailableProperties()`

```php
getAvailableProperties($check_in, $check_out, $authorization, $adults, $children, $lat, $lng, $radius, $property_ids, $negotiated_rate_plans, $number_of_units, $page, $limit): \Katanox\Model\ModelGetAvailabilityResponse
```

Retrieve the list of available properties

Use this endpoint to retrieve availability offers. To receive offers from properties you are already partnered with you need to specify the check in and check out dates, number of adults and either geo coordinates and a radius to search into or directly a list of property ids.  Note: you need to pass either property_ids or both latitude and longitude to query for properties.  You can find more information in the [Availability guide](https://docs.katanox.com/docs/availability)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\AvailabilityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$check_in = 'check_in_example'; // string | Date(YYYY-MM-DD)
$check_out = 'check_out_example'; // string | Date(YYYY-MM-DD)
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token
$adults = 1; // int | Number of adults
$children = 0; // int | Number of children
$lat = 3.4; // float | The Latitude
$lng = 3.4; // float | The Longitude
$radius = 2000; // int | The search radius in meters(m)
$property_ids = array('property_ids_example'); // string[] | List of property IDs to be included. When specified, only these properties will be included in the response. The maximum size of property id list is 50.
$negotiated_rate_plans = array('negotiated_rate_plans_example'); // string[] | List of negotiated rate plan ids to be included.
$number_of_units = 1; // int | The total number of units required
$page = 0; // int | The returned page number
$limit = 10; // int | Number of results per page. The maximum value of the limit is 50.

try {
    $result = $apiInstance->getAvailableProperties($check_in, $check_out, $authorization, $adults, $children, $lat, $lng, $radius, $property_ids, $negotiated_rate_plans, $number_of_units, $page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AvailabilityApi->getAvailableProperties: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **check_in** | **string**| Date(YYYY-MM-DD) | |
| **check_out** | **string**| Date(YYYY-MM-DD) | |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |
| **adults** | **int**| Number of adults | [optional] [default to 1] |
| **children** | **int**| Number of children | [optional] [default to 0] |
| **lat** | **float**| The Latitude | [optional] |
| **lng** | **float**| The Longitude | [optional] |
| **radius** | **int**| The search radius in meters(m) | [optional] [default to 2000] |
| **property_ids** | [**string[]**](../Model/string.md)| List of property IDs to be included. When specified, only these properties will be included in the response. The maximum size of property id list is 50. | [optional] |
| **negotiated_rate_plans** | [**string[]**](../Model/string.md)| List of negotiated rate plan ids to be included. | [optional] |
| **number_of_units** | **int**| The total number of units required | [optional] [default to 1] |
| **page** | **int**| The returned page number | [optional] [default to 0] |
| **limit** | **int**| Number of results per page. The maximum value of the limit is 50. | [optional] [default to 10] |

### Return type

[**\Katanox\Model\ModelGetAvailabilityResponse**](../Model/ModelGetAvailabilityResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
