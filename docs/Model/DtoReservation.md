# # DtoReservation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**adults** | **int** |  | [optional]
**booking_id** | **string** |  | [optional]
**cancellation_policies** | [**\Katanox\Model\PolicyCancellationPolicy[]**](PolicyCancellationPolicy.md) |  | [optional]
**check_in** | **\DateTime** |  | [optional]
**check_out** | **\DateTime** |  | [optional]
**children** | **int** |  | [optional]
**comments** | **string[]** |  | [optional]
**errors** | [**\Katanox\Model\DtoReservationError[]**](DtoReservationError.md) |  | [optional]
**extra_charges** | [**\Katanox\Model\DtoPrice[]**](DtoPrice.md) |  | [optional]
**guests** | [**\Katanox\Model\DtoGuest[]**](DtoGuest.md) |  | [optional]
**id** | **string** |  | [optional]
**no_show_policy** | [**\Katanox\Model\PolicyNoShowPolicy**](PolicyNoShowPolicy.md) |  | [optional]
**offer_id** | **string** |  | [optional]
**price** | [**\Katanox\Model\DtoPrice**](DtoPrice.md) |  | [optional]
**prices_per_night** | [**\Katanox\Model\DtoPricePerNight[]**](DtoPricePerNight.md) |  | [optional]
**status** | **string** | TO_BE_DELIVERED: we have received the reservation and are processing it CONFIRMED: the property has confirmed the reservation MODIFIED: The reservation has been successfully modified TO_BE_MODIFIED: We have received the updated reservation and are sending it to the property MODIFICATION_FAILED: The update operation has failed TO_BE_CANCELLED: We have received the cancellation request and are sending it to the property FAILED: The reservation could not be created on the property CANCELLATION_FAILED: We tried to cancel the reservation but the property did not accept it | [optional]
**supplier_confirmation_id** | **string** | Represents the confirmation id of the reservation in the supplier&#39;s system. The id will be non empty only after it has been confirmed | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
