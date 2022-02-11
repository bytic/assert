<?php

namespace Bytic\Assert\Assertor\Checks;

trait StringChecks
{
    public function string($value, $message = null, $exception = null)
    {
        if (false === is_string($value)) {
            $this->reportInvalidArgument($message, $exception);
        }
    }

}
