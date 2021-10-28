<?php

namespace Katanox\Model\Query;

use Katanox\Exceptions\MissingParametersException;

class AvailabilityQuery
{
    private $check_in;
    private $check_out;
    private $adults;
    private $children = 0;
    private $lat;
    private $lng;
    private $radius;
    private $page;
    private $limit;
    private $include;
    private $locale;
    private $property_ids;

    /**
     * @throws MissingParametersException
     */
    public function validate(): AvailabilityQuery
    {
        if (null != $this->getCheckIn()
            && null != $this->getCheckOut()
            && 0 != $this->getAdults()
            && (0 != $this->getLat() && 0 != $this->getLng())
        ) {
            return $this;
        }

        if ($this->hasPropertyIds()) {
            $valid = null !== $this->getCheckIn()
                && null !== $this->getCheckOut()
                && 0 !== $this->getAdults();
        } else {
            $valid = null !== $this->getCheckIn()
                && null !== $this->getCheckOut()
                && 0 !== $this->getAdults()
                && (0 !== $this->getLat() && 0 !== $this->getLng());
        }

        if (!$valid) {
            throw new MissingParametersException();
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCheckIn()
    {
        return $this->check_in;
    }

    /**
     * @param mixed $check_in
     */
    public function setCheckIn($check_in): AvailabilityQuery
    {
        $this->check_in = $check_in;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCheckOut()
    {
        return $this->check_out;
    }

    /**
     * @param mixed $check_out
     */
    public function setCheckOut($check_out): AvailabilityQuery
    {
        $this->check_out = $check_out;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdults()
    {
        return $this->adults;
    }

    /**
     * @param mixed $adults
     */
    public function setAdults($adults): AvailabilityQuery
    {
        $this->adults = $adults;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children): AvailabilityQuery
    {
        $this->children = $children;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat): AvailabilityQuery
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     */
    public function setLng($lng): AvailabilityQuery
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param mixed $radius
     */
    public function setRadius($radius): AvailabilityQuery
    {
        $this->radius = $radius;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page): AvailabilityQuery
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit): AvailabilityQuery
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInclude()
    {
        return $this->include;
    }

    /**
     * @param mixed $include
     */
    public function setInclude($include): AvailabilityQuery
    {
        $this->include = $include;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale): AvailabilityQuery
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPropertyIds()
    {
        return $this->property_ids;
    }

    /**
     * @param mixed $property_ids
     */
    public function setPropertyIds($property_ids): AvailabilityQuery
    {
        $this->property_ids = $property_ids;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'check_in' => $this->getCheckIn(),
            'check_out' => $this->getCheckOut(),
            'adults' => $this->getAdults(),
            'children' => $this->getChildren(),
            'lat' => $this->getLat(),
            'lng' => $this->getLng(),
            'radius' => $this->getRadius(),
            'page' => $this->getPage(),
            'limit' => $this->getLimit(),
            'include' => $this->getInclude(),
            'locale' => $this->getLocale(),
            'property_ids' => $this->getPropertyIds(),
        ];
    }

    private function hasPropertyIds()
    {
        return null !== $this->getPropertyIds() && count($this->getPropertyIds()) > 0;
    }
}
