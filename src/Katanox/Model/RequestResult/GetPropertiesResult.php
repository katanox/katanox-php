<?php

namespace Katanox\Model\RequestResult;

use Katanox\Model\Property;

class GetPropertiesResult implements \JsonSerializable
{
    /**
     * @var Property[]
     */
    private $properties;

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return $this;
    }

    /**
     * @return Property[]
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param Property[]
     */
    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }
}
