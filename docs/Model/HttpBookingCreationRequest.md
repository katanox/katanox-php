# # HttpBookingCreationRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**comments** | **string[]** |  | [optional]
**customer** | [**\Katanox\Model\HttpCustomer**](HttpCustomer.md) |  |
**loyalty_id** | **string** |  | [optional]
**payment** | [**\Katanox\Model\HttpPayment**](HttpPayment.md) | The payment field is required only if you provide your own credit cards for suppliers. If you need clarification on your payment flow, please reach out to your account manager. |
**reservations** | [**\Katanox\Model\HttpReservationCreationRequest[]**](HttpReservationCreationRequest.md) |  |
**tax_remittance** | **string** | Use this field only if you have registered for tax remittance in the US | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
