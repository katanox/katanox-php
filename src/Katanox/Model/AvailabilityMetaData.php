<?php

namespace Katanox\Model;

class AvailabilityMetaData
{
    /**
     * @var int
     */
    public $total_properties;

    /**
     * @var int
     */
    public $total_pages;

    /**
     * AvailabilityMetaData constructor.
     */
    public function __construct(int $total_properties, int $total_pages)
    {
        $this->total_properties = $total_properties;
        $this->total_pages = $total_pages;
    }

    public function getTotalProperties(): int
    {
        return $this->total_properties;
    }

    public function setTotalProperties(int $total_properties): void
    {
        $this->total_properties = $total_properties;
    }

    public function getTotalPages(): int
    {
        return $this->total_pages;
    }

    public function setTotalPages(int $total_pages): void
    {
        $this->total_pages = $total_pages;
    }
}
