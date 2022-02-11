<?php

namespace Bytic\Assert;

use Bytic\Assert\Assertor\AssertorInterface;
use Bytic\Assert\Assertor\BaseAssertor;

class Assert extends \Webmozart\Assert\Assert
{
    public static function that($value): Assertion
    {
        return new Assertion($value);
    }
}