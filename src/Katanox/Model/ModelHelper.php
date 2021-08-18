<?php

namespace Katanox\Model\Helpers;

use Doctrine\Common\Collections\ArrayCollection;

function areRequiredFieldsSet(array $fields): bool
{
    $collection = new ArrayCollection($fields);

    return $collection->filter(fn ($f) => null !== $f)->count() === count($fields);
}

function areArrayFieldsFilled(array $arrayFields): bool
{
    $collection = new ArrayCollection($arrayFields);

    return $collection->forAll(fn ($k, $f) => count($f) > 0);
}

function modelsCollectionToArray($modelsCollection)
{
    $collection = new ArrayCollection($modelsCollection);

    return $collection
        ->map(fn ($item) => $item->toArray())
        ->toArray()
    ;
}
