<?php

namespace Bytic\Assert;

use Bytic\Assert\Assertions\AssertionChain;

class Assert extends \Webmozart\Assert\Assert
{
    public static function that($value): AssertionChain
    {
        return new AssertionChain($value);
    }

    public static function lazy()
    {

    }
}