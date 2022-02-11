<?php

namespace Bytic\Assert\Assertor;

class BaseAssertor extends AbstractAssertor
{
    public function boolean($value, $message = null, $exception = null)
    {
        if (false === is_bool($value)) {
            $this->reportInvalidArgument($message, $exception);
        }
    }

    public function false($value, $message = null, $exception = null)
    {
        if (false !== $value) {
            $this->reportInvalidArgument($message, $exception);
        }
    }

    public function true($value, $message = null, $exception = null)
    {
        if (true !== $value) {
            $this->reportInvalidArgument($message, $exception);
        }
    }
}
