<?php

namespace Bytic\Assert\Assertor;

use Bytic\Assert\Assertion;

interface AssertorInterface
{
    public function assert(Assertion $assertion): void;
}