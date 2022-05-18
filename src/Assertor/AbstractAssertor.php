<?php

namespace Bytic\Assert\Assertor;

use Bytic\Assert\Assertions\Assertion;

abstract class AbstractAssertor implements AssertorInterface
{
    public function assert(Assertion $assertion): void
    {
        if (false === $assertion->hasRule()) {
            return;
        }
        $method = $assertion->rule;
        $arguments = $assertion->arguments;

        $value = is_callable($assertion->value) ? call_user_func($assertion->value) : $assertion->value;

        $arguments[] = $assertion->message;
        $arguments[] = $assertion->exception;

        $this->{$method}($value, ...$arguments);
    }

    protected function reportInvalidArgument($message, $exception)
    {
        $exception = $exception ?? \InvalidArgumentException::class;
        throw new $exception($message);
    }
}