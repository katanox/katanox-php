<?php

namespace Katanox\Model;

class AvailabilityData
{
    /**
     * @var Property[]
     */
    private $properties;

    /**
     * @return Property[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @param Property[] $properties
     */
    public function setProperties(array $properties): AvailabilityData
    {
        $this->properties = $properties;

        return $this;
    }
}
