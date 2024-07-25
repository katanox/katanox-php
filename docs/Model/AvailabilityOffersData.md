# # AvailabilityOffersData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**number_of_units** | **array<string,array<string,int>>** | Shows the number of rooms available per property. You can use this field to determine which rooms you can combine when creating a booking with multiple rooms. | [optional]
**offers** | [**\Katanox\Model\AvailabilityExternalOffer[]**](AvailabilityExternalOffer.md) |  | [optional]
**total_properties** | **int** | The total number of properties that match the given search parameters when searching using coordinates. The count is not associated with the number of offers. The field can be used to implement pagination; the last page will be: &#x60;PropertiesCount &lt;&#x3D; (page + 1) * limit&#x60;. In case of search using property ids the field will be equal to the number of properties passed to the search. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
