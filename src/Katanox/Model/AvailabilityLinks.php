<?php

namespace Katanox\Model;

class AvailabilityLinks
{
    /**
     * @var null|Link
     */
    private $next;

    /**
     * @var null|Link
     */
    private $previous;

    /**
     * @var null|Link
     */
    private $first;

    /**
     * @var null|Link
     */
    private $last;

    /**
     * AvailabilityLinks constructor.
     */
    public function __construct(?Link $next, ?Link $previous, ?Link $first, ?Link $last)
    {
        $this->next = $next;
        $this->previous = $previous;
        $this->first = $first;
        $this->last = $last;
    }

    public function getNext(): ?Link
    {
        return $this->next;
    }

    public function setNext(?Link $next): void
    {
        $this->next = $next;
    }

    public function getPrevious(): ?Link
    {
        return $this->previous;
    }

    public function setPrevious(?Link $previous): void
    {
        $this->previous = $previous;
    }

    public function getFirst(): ?Link
    {
        return $this->first;
    }

    public function setFirst(?Link $first): void
    {
        $this->first = $first;
    }

    public function getLast(): ?Link
    {
        return $this->last;
    }

    public function setLast(?Link $last): void
    {
        $this->last = $last;
    }
}
