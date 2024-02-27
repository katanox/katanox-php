<?php
/**
 * AvailabilityExternalOffer
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
 * OpenAPI Generator version: 7.3.0
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
 * AvailabilityExternalOffer Class Doc Comment
 *
 * @category Class
 * @package  Katanox
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AvailabilityExternalOffer implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'availability.ExternalOffer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'breakdown' => '\Katanox\Model\GithubComKatanoxApiPkgModelAvailabilityPricePerNight[]',
        'id' => 'string',
        'occupancy_has_offer' => 'bool[]',
        'price' => '\Katanox\Model\AvailabilityExternalPrice',
        'property_id' => 'string',
        'rate_plan_id' => 'string',
        'rate_type' => 'string',
        'unit_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'breakdown' => null,
        'id' => null,
        'occupancy_has_offer' => null,
        'price' => null,
        'property_id' => null,
        'rate_plan_id' => null,
        'rate_type' => null,
        'unit_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'breakdown' => false,
        'id' => false,
        'occupancy_has_offer' => false,
        'price' => false,
        'property_id' => false,
        'rate_plan_id' => false,
        'rate_type' => false,
        'unit_id' => false
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
        'breakdown' => 'breakdown',
        'id' => 'id',
        'occupancy_has_offer' => 'occupancy_has_offer',
        'price' => 'price',
        'property_id' => 'property_id',
        'rate_plan_id' => 'rate_plan_id',
        'rate_type' => 'rate_type',
        'unit_id' => 'unit_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'breakdown' => 'setBreakdown',
        'id' => 'setId',
        'occupancy_has_offer' => 'setOccupancyHasOffer',
        'price' => 'setPrice',
        'property_id' => 'setPropertyId',
        'rate_plan_id' => 'setRatePlanId',
        'rate_type' => 'setRateType',
        'unit_id' => 'setUnitId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'breakdown' => 'getBreakdown',
        'id' => 'getId',
        'occupancy_has_offer' => 'getOccupancyHasOffer',
        'price' => 'getPrice',
        'property_id' => 'getPropertyId',
        'rate_plan_id' => 'getRatePlanId',
        'rate_type' => 'getRateType',
        'unit_id' => 'getUnitId'
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

    public const RATE_TYPE__PUBLIC = 'PUBLIC';
    public const RATE_TYPE_CNR = 'CNR';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRateTypeAllowableValues()
    {
        return [
            self::RATE_TYPE__PUBLIC,
            self::RATE_TYPE_CNR,
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
        $this->setIfExists('breakdown', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('occupancy_has_offer', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('property_id', $data ?? [], null);
        $this->setIfExists('rate_plan_id', $data ?? [], null);
        $this->setIfExists('rate_type', $data ?? [], null);
        $this->setIfExists('unit_id', $data ?? [], null);
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

        $allowedValues = $this->getRateTypeAllowableValues();
        if (!is_null($this->container['rate_type']) && !in_array($this->container['rate_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'rate_type', must be one of '%s'",
                $this->container['rate_type'],
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
     * Gets breakdown
     *
     * @return \Katanox\Model\GithubComKatanoxApiPkgModelAvailabilityPricePerNight[]|null
     */
    public function getBreakdown()
    {
        return $this->container['breakdown'];
    }

    /**
     * Sets breakdown
     *
     * @param \Katanox\Model\GithubComKatanoxApiPkgModelAvailabilityPricePerNight[]|null $breakdown breakdown
     *
     * @return self
     */
    public function setBreakdown($breakdown)
    {
        if (is_null($breakdown)) {
            throw new \InvalidArgumentException('non-nullable breakdown cannot be null');
        }
        $this->container['breakdown'] = $breakdown;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id id
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets occupancy_has_offer
     *
     * @return bool[]|null
     */
    public function getOccupancyHasOffer()
    {
        return $this->container['occupancy_has_offer'];
    }

    /**
     * Sets occupancy_has_offer
     *
     * @param bool[]|null $occupancy_has_offer occupancy_has_offer
     *
     * @return self
     */
    public function setOccupancyHasOffer($occupancy_has_offer)
    {
        if (is_null($occupancy_has_offer)) {
            throw new \InvalidArgumentException('non-nullable occupancy_has_offer cannot be null');
        }
        $this->container['occupancy_has_offer'] = $occupancy_has_offer;

        return $this;
    }

    /**
     * Gets price
     *
     * @return \Katanox\Model\AvailabilityExternalPrice|null
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param \Katanox\Model\AvailabilityExternalPrice|null $price price
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
     * Gets property_id
     *
     * @return string|null
     */
    public function getPropertyId()
    {
        return $this->container['property_id'];
    }

    /**
     * Sets property_id
     *
     * @param string|null $property_id property_id
     *
     * @return self
     */
    public function setPropertyId($property_id)
    {
        if (is_null($property_id)) {
            throw new \InvalidArgumentException('non-nullable property_id cannot be null');
        }
        $this->container['property_id'] = $property_id;

        return $this;
    }

    /**
     * Gets rate_plan_id
     *
     * @return string|null
     */
    public function getRatePlanId()
    {
        return $this->container['rate_plan_id'];
    }

    /**
     * Sets rate_plan_id
     *
     * @param string|null $rate_plan_id rate_plan_id
     *
     * @return self
     */
    public function setRatePlanId($rate_plan_id)
    {
        if (is_null($rate_plan_id)) {
            throw new \InvalidArgumentException('non-nullable rate_plan_id cannot be null');
        }
        $this->container['rate_plan_id'] = $rate_plan_id;

        return $this;
    }

    /**
     * Gets rate_type
     *
     * @return string|null
     */
    public function getRateType()
    {
        return $this->container['rate_type'];
    }

    /**
     * Sets rate_type
     *
     * @param string|null $rate_type rate_type
     *
     * @return self
     */
    public function setRateType($rate_type)
    {
        if (is_null($rate_type)) {
            throw new \InvalidArgumentException('non-nullable rate_type cannot be null');
        }
        $allowedValues = $this->getRateTypeAllowableValues();
        if (!in_array($rate_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'rate_type', must be one of '%s'",
                    $rate_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['rate_type'] = $rate_type;

        return $this;
    }

    /**
     * Gets unit_id
     *
     * @return string|null
     */
    public function getUnitId()
    {
        return $this->container['unit_id'];
    }

    /**
     * Sets unit_id
     *
     * @param string|null $unit_id unit_id
     *
     * @return self
     */
    public function setUnitId($unit_id)
    {
        if (is_null($unit_id)) {
            throw new \InvalidArgumentException('non-nullable unit_id cannot be null');
        }
        $this->container['unit_id'] = $unit_id;

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


