<?php

namespace Bytic\Assert\Assertor;

use Bytic\Assert\Assertions\Assertion;

interface AssertorInterface
{
    public function assert(Assertion $assertion): void;
}