<?php

namespace Katanox\Model;

use Katanox\Exceptions\MissingParametersException;

interface Validatable
{
    /**
     * Validates the required fields of the model and returns the
     * model if it's valid.
     *
     * @throws MissingParametersException
     */
    public function validate();

    public function toArray(): array;
}
