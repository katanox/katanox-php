# Katanox\CorporateProfilesApi

All URIs are relative to https://api.katanox.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**corporateProfilesList()**](CorporateProfilesApi.md#corporateProfilesList) | **GET** /corporate-profiles | List corporate profiles |


## `corporateProfilesList()`

```php
corporateProfilesList($authorization, $page, $limit): \Katanox\Model\DtoListCorporateProfileResponse
```

List corporate profiles

List  the corporate profile resources which are connected to the buyer.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Katanox\Api\CorporateProfilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = 'authorization_example'; // string | Type 'Bearer' and then your API Token
$page = 0; // int | The returned page number
$limit = 10; // int | Number of results per page. The maximum value of the limit is 50.

try {
    $result = $apiInstance->corporateProfilesList($authorization, $page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CorporateProfilesApi->corporateProfilesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **authorization** | **string**| Type &#39;Bearer&#39; and then your API Token | |
| **page** | **int**| The returned page number | [optional] [default to 0] |
| **limit** | **int**| Number of results per page. The maximum value of the limit is 50. | [optional] [default to 10] |

### Return type

[**\Katanox\Model\DtoListCorporateProfileResponse**](../Model/DtoListCorporateProfileResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
