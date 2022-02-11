<?php

namespace Bytic\Assert\Assertor\Checks;

trait NumericChecks
{
    public function integer($value, $message = null, $exception = null)
    {
        if (false === \is_int($value)) {
            $message = $message ?? 'Value is not an integer';
            $this->reportInvalidArgument($message, $exception);
        }
    }

    public function integerish($value, $message = null, $exception = null)
    {
        if (false === \is_numeric($value) || $value != (int)$value) {
            $message = $message ?? 'Value is not an integerish';
            $this->reportInvalidArgument($message, $exception);
        }
    }

    public function positiveInteger($value, $message = null, $exception = null)
    {
        if (!(\is_int($value) && $value > 0)) {
            $message = $message ?? 'Value is not a positive integer';
            $this->reportInvalidArgument($message, $exception);
        }
    }

    public function float($value, $message = null, $exception = null)
    {
        if (false === \is_float($value)) {
            $message = $message ?? 'Value is not a float';
            $this->reportInvalidArgument($message, $exception);
        }
    }

    public function numeric($value, $message = null, $exception = null)
    {
        if (false === \is_numeric($value)) {
            $message = $message ?? 'Value is not numeric';
            $this->reportInvalidArgument($message, $exception);
        }
    }

    public function natural($value, $message = null, $exception = null)
    {
        if (false === \is_int($value) || $value < 0) {
            $message = $message ?? 'Value is not a natural number';
            $this->reportInvalidArgument($message, $exception);
        }
    }
}
