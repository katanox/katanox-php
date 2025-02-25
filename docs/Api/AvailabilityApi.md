# Katanox\AvailabilityApi

All URIs are relative to https://api.katanox.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAvailableProperties()**](AvailabilityApi.md#getAvailableProperties) | **GET** /availability | Retrieve the list of available properties |


## `getAvailableProperties()`

```php
getAvailableProperties($check_in, $check_out, $authorization, $adults, $children, $lat, $lng, $radius, $property_ids, $negotiated_rate_plans, $corporate_profile_id, $number_of_units, $page, $limit, $lowest, $price_breakdown, $unit_type, $occupancy, $separate_rates_per_payment): \Katanox\Model\AvailabilityGetAvailabilityResponse
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
$negotiated_rate_plans = array('negotiated_rate_plans_example'); // string[] | Deprecated! List of negotiated rate plan ids to be included.
$corporate_profile_id = 'null'; // string | The corporate_profile_id can be used to fetch specific rates linked to a corporate.
$number_of_units = 1; // int | The total number of units required
$page = 0; // int | The returned page number
$limit = 10; // int | Limits the number of properties that will be used to search for availability when searching with coordinates. In case of a search using property ids, `page` and `limit` are ignored
$lowest = false; // bool | If set to true returns only the cheapest price per property
$price_breakdown = false; // bool | If set to true then each offer will contain the nightly price alongside the total price
$unit_type = 'unit_type_example'; // string | The unit type
$occupancy = 'occupancy_example'; // string | Represents the occupancy for a room. Format: occupancy=numberOfAdults-firstChildAge;nextChildAge
$separate_rates_per_payment = false; // bool | If true, a rate plan with multiple payment modes will generate multiple offers using the same rate/unit combination

try {
    $result = $apiInstance->getAvailableProperties($check_in, $check_out, $authorization, $adults, $children, $lat, $lng, $radius, $property_ids, $negotiated_rate_plans, $corporate_profile_id, $number_of_units, $page, $limit, $lowest, $price_breakdown, $unit_type, $occupancy, $separate_rates_per_payment);
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
| **negotiated_rate_plans** | [**string[]**](../Model/string.md)| Deprecated! List of negotiated rate plan ids to be included. | [optional] |
| **corporate_profile_id** | **string**| The corporate_profile_id can be used to fetch specific rates linked to a corporate. | [optional] [default to &#39;null&#39;] |
| **number_of_units** | **int**| The total number of units required | [optional] [default to 1] |
| **page** | **int**| The returned page number | [optional] [default to 0] |
| **limit** | **int**| Limits the number of properties that will be used to search for availability when searching with coordinates. In case of a search using property ids, &#x60;page&#x60; and &#x60;limit&#x60; are ignored | [optional] [default to 10] |
| **lowest** | **bool**| If set to true returns only the cheapest price per property | [optional] [default to false] |
| **price_breakdown** | **bool**| If set to true then each offer will contain the nightly price alongside the total price | [optional] [default to false] |
| **unit_type** | **string**| The unit type | [optional] |
| **occupancy** | **string**| Represents the occupancy for a room. Format: occupancy&#x3D;numberOfAdults-firstChildAge;nextChildAge | [optional] |
| **separate_rates_per_payment** | **bool**| If true, a rate plan with multiple payment modes will generate multiple offers using the same rate/unit combination | [optional] [default to false] |

### Return type

[**\Katanox\Model\AvailabilityGetAvailabilityResponse**](../Model/AvailabilityGetAvailabilityResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
