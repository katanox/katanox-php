<?php

namespace Katanox\Exceptions;

use Throwable;

class MissingParametersException extends \Exception
{
    public function __construct($message = 'The required parameters are missing', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
