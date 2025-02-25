<?php
/**
 * RateplansOfferRatePlan
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
 * Generator version: 7.12.0-SNAPSHOT
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
 * RateplansOfferRatePlan Class Doc Comment
 *
 * @category Class
 * @package  Katanox
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class RateplansOfferRatePlan implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'rateplans.OfferRatePlan';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cancellation_policies' => '\Katanox\Model\PolicyOfferCancellationPolicy[]',
        'description' => 'string',
        'eligible_for_loyalty_points' => 'bool',
        'id' => 'string',
        'meals' => 'string',
        'name' => 'string',
        'no_show_policy' => '\Katanox\Model\PolicyNoShowPolicy',
        'property_id' => 'string',
        'rate_type' => 'string',
        'services' => '\Katanox\Model\RateplansRatePlanService[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cancellation_policies' => null,
        'description' => null,
        'eligible_for_loyalty_points' => null,
        'id' => null,
        'meals' => null,
        'name' => null,
        'no_show_policy' => null,
        'property_id' => null,
        'rate_type' => null,
        'services' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'cancellation_policies' => false,
        'description' => false,
        'eligible_for_loyalty_points' => false,
        'id' => false,
        'meals' => false,
        'name' => false,
        'no_show_policy' => false,
        'property_id' => false,
        'rate_type' => false,
        'services' => false
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
        'cancellation_policies' => 'cancellation_policies',
        'description' => 'description',
        'eligible_for_loyalty_points' => 'eligible_for_loyalty_points',
        'id' => 'id',
        'meals' => 'meals',
        'name' => 'name',
        'no_show_policy' => 'no_show_policy',
        'property_id' => 'property_id',
        'rate_type' => 'rate_type',
        'services' => 'services'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cancellation_policies' => 'setCancellationPolicies',
        'description' => 'setDescription',
        'eligible_for_loyalty_points' => 'setEligibleForLoyaltyPoints',
        'id' => 'setId',
        'meals' => 'setMeals',
        'name' => 'setName',
        'no_show_policy' => 'setNoShowPolicy',
        'property_id' => 'setPropertyId',
        'rate_type' => 'setRateType',
        'services' => 'setServices'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cancellation_policies' => 'getCancellationPolicies',
        'description' => 'getDescription',
        'eligible_for_loyalty_points' => 'getEligibleForLoyaltyPoints',
        'id' => 'getId',
        'meals' => 'getMeals',
        'name' => 'getName',
        'no_show_policy' => 'getNoShowPolicy',
        'property_id' => 'getPropertyId',
        'rate_type' => 'getRateType',
        'services' => 'getServices'
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
    public const RATE_TYPE_NET = 'NET';
    public const RATE_TYPE_MOBILE = 'MOBILE';
    public const RATE_TYPE_CUG = 'CUG';
    public const RATE_TYPE_PACKAGE = 'PACKAGE';
    public const RATE_TYPE_OPAQUE = 'OPAQUE';
    public const RATE_TYPE_B2_B = 'B2B';
    public const RATE_TYPE_GENERAL_PROMO = 'GENERAL_PROMO';
    public const RATE_TYPE_TEMP_PROMO = 'TEMP_PROMO';

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
            self::RATE_TYPE_NET,
            self::RATE_TYPE_MOBILE,
            self::RATE_TYPE_CUG,
            self::RATE_TYPE_PACKAGE,
            self::RATE_TYPE_OPAQUE,
            self::RATE_TYPE_B2_B,
            self::RATE_TYPE_GENERAL_PROMO,
            self::RATE_TYPE_TEMP_PROMO,
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
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('cancellation_policies', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('eligible_for_loyalty_points', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('meals', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('no_show_policy', $data ?? [], null);
        $this->setIfExists('property_id', $data ?? [], null);
        $this->setIfExists('rate_type', $data ?? [], null);
        $this->setIfExists('services', $data ?? [], null);
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
     * Gets cancellation_policies
     *
     * @return \Katanox\Model\PolicyOfferCancellationPolicy[]|null
     */
    public function getCancellationPolicies()
    {
        return $this->container['cancellation_policies'];
    }

    /**
     * Sets cancellation_policies
     *
     * @param \Katanox\Model\PolicyOfferCancellationPolicy[]|null $cancellation_policies cancellation_policies
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
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description description
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets eligible_for_loyalty_points
     *
     * @return bool|null
     */
    public function getEligibleForLoyaltyPoints()
    {
        return $this->container['eligible_for_loyalty_points'];
    }

    /**
     * Sets eligible_for_loyalty_points
     *
     * @param bool|null $eligible_for_loyalty_points eligible_for_loyalty_points
     *
     * @return self
     */
    public function setEligibleForLoyaltyPoints($eligible_for_loyalty_points)
    {
        if (is_null($eligible_for_loyalty_points)) {
            throw new \InvalidArgumentException('non-nullable eligible_for_loyalty_points cannot be null');
        }
        $this->container['eligible_for_loyalty_points'] = $eligible_for_loyalty_points;

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
     * Gets meals
     *
     * @return string|null
     */
    public function getMeals()
    {
        return $this->container['meals'];
    }

    /**
     * Sets meals
     *
     * @param string|null $meals meals
     *
     * @return self
     */
    public function setMeals($meals)
    {
        if (is_null($meals)) {
            throw new \InvalidArgumentException('non-nullable meals cannot be null');
        }
        $this->container['meals'] = $meals;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets no_show_policy
     *
     * @return \Katanox\Model\PolicyNoShowPolicy|null
     */
    public function getNoShowPolicy()
    {
        return $this->container['no_show_policy'];
    }

    /**
     * Sets no_show_policy
     *
     * @param \Katanox\Model\PolicyNoShowPolicy|null $no_show_policy no_show_policy
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
     * Gets services
     *
     * @return \Katanox\Model\RateplansRatePlanService[]|null
     */
    public function getServices()
    {
        return $this->container['services'];
    }

    /**
     * Sets services
     *
     * @param \Katanox\Model\RateplansRatePlanService[]|null $services services
     *
     * @return self
     */
    public function setServices($services)
    {
        if (is_null($services)) {
            throw new \InvalidArgumentException('non-nullable services cannot be null');
        }
        $this->container['services'] = $services;

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


