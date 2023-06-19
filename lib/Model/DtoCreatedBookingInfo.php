<?php
/**
 * DtoCreatedBookingInfo.
 *
 * PHP version 7.4
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */

/**
 * Katanox API Documentation.
 *
 * The Katanox API allows any travel seller to search and book accommodation.
 *
 * The version of the OpenAPI document: 2.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.5.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Katanox\Model;

use ArrayAccess;
use InvalidArgumentException;
use JsonSerializable;
use Katanox\ObjectSerializer;
use ReturnTypeWillChange;

/**
 * DtoCreatedBookingInfo Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 *
 * @implements \ArrayAccess<string, mixed>
 */
class DtoCreatedBookingInfo implements ModelInterface, ArrayAccess, JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'dto.CreatedBookingInfo';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'comments' => 'string[]',
        'customer' => '\Katanox\Model\DtoPerson',
        'reservations' => '\Katanox\Model\DtoCreatedReservation[]',
        'total_price' => '\Katanox\Model\DtoPrice',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     *
     * @phpstan-var array<string, string|null>
     *
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'comments' => null,
        'customer' => null,
        'reservations' => null,
        'total_price' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization.
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'comments' => false,
        'customer' => false,
        'reservations' => false,
        'total_price' => false,
    ];

    /**
     * If a nullable field gets set to null, insert it here.
     *
     * @var bool[]
     */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'comments' => 'comments',
        'customer' => 'customer',
        'reservations' => 'reservations',
        'total_price' => 'total_price',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'comments' => 'setComments',
        'customer' => 'setCustomer',
        'reservations' => 'setReservations',
        'total_price' => 'setTotalPrice',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'comments' => 'getComments',
        'customer' => 'getCustomer',
        'reservations' => 'getReservations',
        'total_price' => 'getTotalPrice',
    ];

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('comments', $data ?? [], null);
        $this->setIfExists('customer', $data ?? [], null);
        $this->setIfExists('reservations', $data ?? [], null);
        $this->setIfExists('total_price', $data ?? [], null);
    }

    /**
     * Gets the string presentation of the object.
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
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Checks if a property is nullable.
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
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

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        return [];
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return 0 === count($this->listInvalidProperties());
    }

    /**
     * Gets comments.
     *
     * @return null|string[]
     */
    public function getComments()
    {
        return $this->container['comments'];
    }

    /**
     * Sets comments.
     *
     * @param null|string[] $comments comments
     *
     * @return self
     */
    public function setComments($comments)
    {
        if (is_null($comments)) {
            throw new InvalidArgumentException('non-nullable comments cannot be null');
        }
        $this->container['comments'] = $comments;

        return $this;
    }

    /**
     * Gets customer.
     *
     * @return null|\Katanox\Model\DtoPerson
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer.
     *
     * @param null|\Katanox\Model\DtoPerson $customer customer
     *
     * @return self
     */
    public function setCustomer($customer)
    {
        if (is_null($customer)) {
            throw new InvalidArgumentException('non-nullable customer cannot be null');
        }
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets reservations.
     *
     * @return null|\Katanox\Model\DtoCreatedReservation[]
     */
    public function getReservations()
    {
        return $this->container['reservations'];
    }

    /**
     * Sets reservations.
     *
     * @param null|\Katanox\Model\DtoCreatedReservation[] $reservations reservations
     *
     * @return self
     */
    public function setReservations($reservations)
    {
        if (is_null($reservations)) {
            throw new InvalidArgumentException('non-nullable reservations cannot be null');
        }
        $this->container['reservations'] = $reservations;

        return $this;
    }

    /**
     * Gets total_price.
     *
     * @return null|\Katanox\Model\DtoPrice
     */
    public function getTotalPrice()
    {
        return $this->container['total_price'];
    }

    /**
     * Sets total_price.
     *
     * @param null|\Katanox\Model\DtoPrice $total_price total_price
     *
     * @return self
     */
    public function setTotalPrice($total_price)
    {
        if (is_null($total_price)) {
            throw new InvalidArgumentException('non-nullable total_price cannot be null');
        }
        $this->container['total_price'] = $total_price;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
     *
     * @return null|mixed
     */
    #[ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param null|int $offset Offset
     * @param mixed    $value  Value to be set
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
     * @param int $offset Offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     *
     * @see https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed returns data which can be serialized by json_encode(), which is a value
     *               of any type other than a resource
     */
    #[ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets a header-safe presentation of the object.
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }

    /**
     * Array of nullable properties.
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null.
     *
     * @return bool[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null.
     *
     * @param bool[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
     * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
     * $this->openAPINullablesSetToNull array.
     *
     * @param mixed $defaultValue
     */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }
}
