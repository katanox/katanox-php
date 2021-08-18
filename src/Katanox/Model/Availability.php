<?php

namespace Katanox\Model;

use Katanox\KatanoxRequest;

class Availability implements \JsonSerializable
{
    /**
     * @var AvailabilityData
     */
    public $data;

    /**
     * @var AvailabilityMetaData
     */
    public $meta;

    /**
     * @var AvailabilityLinks
     */
    public $links;

    /**
     * @var KatanoxRequest the original request that generated this data
     */
    protected $request;

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return $this;
    }

    public function getRequest(): KatanoxRequest
    {
        return $this->request;
    }

    public function setRequest(KatanoxRequest $request): void
    {
        $this->request = $request;
    }

    /**
     * @return AvailabilityData
     */
    public function getData(): ?AvailabilityData
    {
        return $this->data;
    }

    public function setData(AvailabilityData $data): void
    {
        $this->data = $data;
    }

    public function getMeta(): AvailabilityMetaData
    {
        return $this->meta;
    }

    public function setMeta(AvailabilityMetaData $meta): void
    {
        $this->meta = $meta;
    }

    public function getLinks(): AvailabilityLinks
    {
        return $this->links;
    }

    public function setLinks(AvailabilityLinks $links): void
    {
        $this->links = $links;
    }
}
