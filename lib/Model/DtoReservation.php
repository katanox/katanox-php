<?php
/**
 * DtoReservation
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Katanox
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Katanox API Documentation
 *
 * The Katanox API allows any travel seller to search and book accommodation.
 *
 * The version of the OpenAPI document: 2.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.6.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Katanox\Model;

use \ArrayAccess;
use \Katanox\ObjectSerializer;

/**
 * DtoReservation Class Doc Comment
 *
 * @category Class
 * @package  Katanox
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DtoReservation implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dto.Reservation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'adults' => 'int',
        'cancellation_policies' => '\Katanox\Model\DtoCancellationPolicy[]',
        'check_in' => '\DateTime',
        'check_out' => '\DateTime',
        'children' => 'int',
        'comments' => 'string[]',
        'errors' => '\Katanox\Model\DtoReservationError[]',
        'guests' => '\Katanox\Model\DtoGuest[]',
        'no_show_policy' => '\Katanox\Model\DtoNoShowPolicy',
        'price' => '\Katanox\Model\DtoPrice',
        'status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'adults' => null,
        'cancellation_policies' => null,
        'check_in' => 'date',
        'check_out' => 'date',
        'children' => null,
        'comments' => null,
        'errors' => null,
        'guests' => null,
        'no_show_policy' => null,
        'price' => null,
        'status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'adults' => false,
		'cancellation_policies' => false,
		'check_in' => false,
		'check_out' => false,
		'children' => false,
		'comments' => false,
		'errors' => false,
		'guests' => false,
		'no_show_policy' => false,
		'price' => false,
		'status' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'adults' => 'adults',
        'cancellation_policies' => 'cancellation_policies',
        'check_in' => 'check_in',
        'check_out' => 'check_out',
        'children' => 'children',
        'comments' => 'comments',
        'errors' => 'errors',
        'guests' => 'guests',
        'no_show_policy' => 'no_show_policy',
        'price' => 'price',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'adults' => 'setAdults',
        'cancellation_policies' => 'setCancellationPolicies',
        'check_in' => 'setCheckIn',
        'check_out' => 'setCheckOut',
        'children' => 'setChildren',
        'comments' => 'setComments',
        'errors' => 'setErrors',
        'guests' => 'setGuests',
        'no_show_policy' => 'setNoShowPolicy',
        'price' => 'setPrice',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'adults' => 'getAdults',
        'cancellation_policies' => 'getCancellationPolicies',
        'check_in' => 'getCheckIn',
        'check_out' => 'getCheckOut',
        'children' => 'getChildren',
        'comments' => 'getComments',
        'errors' => 'getErrors',
        'guests' => 'getGuests',
        'no_show_policy' => 'getNoShowPolicy',
        'price' => 'getPrice',
        'status' => 'getStatus'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const STATUS_CONFIRMED = 'CONFIRMED';
    public const STATUS_TO_BE_DELIVERED = 'TO_BE_DELIVERED';
    public const STATUS_MODIFIED = 'MODIFIED';
    public const STATUS_TO_BE_MODIFIED = 'TO_BE_MODIFIED';
    public const STATUS_MODIFICATION_FAILED = 'MODIFICATION_FAILED';
    public const STATUS_CANCELLED = 'CANCELLED';
    public const STATUS_TO_BE_CANCELLED = 'TO_BE_CANCELLED';
    public const STATUS_FAILED = 'FAILED';
    public const STATUS_CANCELLATION_FAILED = 'CANCELLATION_FAILED';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_CONFIRMED,
            self::STATUS_TO_BE_DELIVERED,
            self::STATUS_MODIFIED,
            self::STATUS_TO_BE_MODIFIED,
            self::STATUS_MODIFICATION_FAILED,
            self::STATUS_CANCELLED,
            self::STATUS_TO_BE_CANCELLED,
            self::STATUS_FAILED,
            self::STATUS_CANCELLATION_FAILED,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('adults', $data ?? [], null);
        $this->setIfExists('cancellation_policies', $data ?? [], null);
        $this->setIfExists('check_in', $data ?? [], null);
        $this->setIfExists('check_out', $data ?? [], null);
        $this->setIfExists('children', $data ?? [], null);
        $this->setIfExists('comments', $data ?? [], null);
        $this->setIfExists('errors', $data ?? [], null);
        $this->setIfExists('guests', $data ?? [], null);
        $this->setIfExists('no_show_policy', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets adults
     *
     * @return int|null
     */
    public function getAdults()
    {
        return $this->container['adults'];
    }

    /**
     * Sets adults
     *
     * @param int|null $adults adults
     *
     * @return self
     */
    public function setAdults($adults)
    {
        if (is_null($adults)) {
            throw new \InvalidArgumentException('non-nullable adults cannot be null');
        }
        $this->container['adults'] = $adults;

        return $this;
    }

    /**
     * Gets cancellation_policies
     *
     * @return \Katanox\Model\DtoCancellationPolicy[]|null
     */
    public function getCancellationPolicies()
    {
        return $this->container['cancellation_policies'];
    }

    /**
     * Sets cancellation_policies
     *
     * @param \Katanox\Model\DtoCancellationPolicy[]|null $cancellation_policies cancellation_policies
     *
     * @return self
     */
    public function setCancellationPolicies($cancellation_policies)
    {
        if (is_null($cancellation_policies)) {
            throw new \InvalidArgumentException('non-nullable cancellation_policies cannot be null');
        }
        $this->container['cancellation_policies'] = $cancellation_policies;

        return $this;
    }

    /**
     * Gets check_in
     *
     * @return \DateTime|null
     */
    public function getCheckIn()
    {
        return $this->container['check_in'];
    }

    /**
     * Sets check_in
     *
     * @param \DateTime|null $check_in check_in
     *
     * @return self
     */
    public function setCheckIn($check_in)
    {
        if (is_null($check_in)) {
            throw new \InvalidArgumentException('non-nullable check_in cannot be null');
        }
        $this->container['check_in'] = $check_in;

        return $this;
    }

    /**
     * Gets check_out
     *
     * @return \DateTime|null
     */
    public function getCheckOut()
    {
        return $this->container['check_out'];
    }

    /**
     * Sets check_out
     *
     * @param \DateTime|null $check_out check_out
     *
     * @return self
     */
    public function setCheckOut($check_out)
    {
        if (is_null($check_out)) {
            throw new \InvalidArgumentException('non-nullable check_out cannot be null');
        }
        $this->container['check_out'] = $check_out;

        return $this;
    }

    /**
     * Gets children
     *
     * @return int|null
     */
    public function getChildren()
    {
        return $this->container['children'];
    }

    /**
     * Sets children
     *
     * @param int|null $children children
     *
     * @return self
     */
    public function setChildren($children)
    {
        if (is_null($children)) {
            throw new \InvalidArgumentException('non-nullable children cannot be null');
        }
        $this->container['children'] = $children;

        return $this;
    }

    /**
     * Gets comments
     *
     * @return string[]|null
     */
    public function getComments()
    {
        return $this->container['comments'];
    }

    /**
     * Sets comments
     *
     * @param string[]|null $comments comments
     *
     * @return self
     */
    public function setComments($comments)
    {
        if (is_null($comments)) {
            throw new \InvalidArgumentException('non-nullable comments cannot be null');
        }
        $this->container['comments'] = $comments;

        return $this;
    }

    /**
     * Gets errors
     *
     * @return \Katanox\Model\DtoReservationError[]|null
     */
    public function getErrors()
    {
        return $this->container['errors'];
    }

    /**
     * Sets errors
     *
     * @param \Katanox\Model\DtoReservationError[]|null $errors errors
     *
     * @return self
     */
    public function setErrors($errors)
    {
        if (is_null($errors)) {
            throw new \InvalidArgumentException('non-nullable errors cannot be null');
        }
        $this->container['errors'] = $errors;

        return $this;
    }

    /**
     * Gets guests
     *
     * @return \Katanox\Model\DtoGuest[]|null
     */
    public function getGuests()
    {
        return $this->container['guests'];
    }

    /**
     * Sets guests
     *
     * @param \Katanox\Model\DtoGuest[]|null $guests guests
     *
     * @return self
     */
    public function setGuests($guests)
    {
        if (is_null($guests)) {
            throw new \InvalidArgumentException('non-nullable guests cannot be null');
        }
        $this->container['guests'] = $guests;

        return $this;
    }

    /**
     * Gets no_show_policy
     *
     * @return \Katanox\Model\DtoNoShowPolicy|null
     */
    public function getNoShowPolicy()
    {
        return $this->container['no_show_policy'];
    }

    /**
     * Sets no_show_policy
     *
     * @param \Katanox\Model\DtoNoShowPolicy|null $no_show_policy no_show_policy
     *
     * @return self
     */
    public function setNoShowPolicy($no_show_policy)
    {
        if (is_null($no_show_policy)) {
            throw new \InvalidArgumentException('non-nullable no_show_policy cannot be null');
        }
        $this->container['no_show_policy'] = $no_show_policy;

        return $this;
    }

    /**
     * Gets price
     *
     * @return \Katanox\Model\DtoPrice|null
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param \Katanox\Model\DtoPrice|null $price price
     *
     * @return self
     */
    public function setPrice($price)
    {
        if (is_null($price)) {
            throw new \InvalidArgumentException('non-nullable price cannot be null');
        }
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status TO_BE_DELIVERED: we have received the reservation and are processing it CONFIRMED: the property has confirmed the reservation MODIFIED: The reservation has been successfully modified TO_BE_MODIFIED: We have received the updated reservation and are sending it to the property MODIFICATION_FAILED: The update operation has failed TO_BE_CANCELLED: We have received the cancellation request and are sending it to the property FAILED: The reservation could not be created on the property CANCELLATION_FAILED: We tried to cancel the reservation but the property did not accept it
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


