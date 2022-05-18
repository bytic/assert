<?php

namespace Bytic\Assert\Assertor;

use Bytic\Assert\Assertions\Assertion;

class Assertors
{
    /**
     * @var AbstractAssertor[]
     */
    protected static array $assertors = [];

    public static function get($name)
    {
        if (!isset(static::$assertors[$name])) {
            static::$assertors[$name] = new $name();
        }
        return static::$assertors[$name];
    }


    public static function assert(Assertion $assertion)
    {
        static::get($assertion->assertor)->assert($assertion);
    }
}