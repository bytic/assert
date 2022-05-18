<?php

namespace Bytic\Assert\Tests;

use Bytic\Assert\Assert;
use Bytic\Assert\Assertions\AssertionChain;
use InvalidArgumentException;

class AssertTest extends TestCase
{
    /** @test */
    public function that_returns_no_exception()
    {
        $assertion = Assert::that(true);

        self::assertInstanceOf(AssertionChain::class, $assertion);
    }

    /** @test */
    public function that_returns_assertion()
    {
        $assertion = Assert::that(true)->isTrue();

        self::assertInstanceOf(AssertionChain::class, $assertion);
    }

    /** @test */
    public function rules_can_be_chained()
    {
        static::expectException(InvalidArgumentException::class);

        $call1 = 0;
        $callback = function () use (&$call1) {
            ++$call1;
            return true;
        };

        Assert::that($callback)
            ->isBool()
            ->isFalse();

        self::assertSame(1, $call1);
    }

    /** @test */
    public function chainable_can_define_message()
    {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage('Failed');

        Assert::that(true)
            ->orFail('Failed')
            ->isBool()
            ->isFalse();
    }

    /** @test */
    public function chainable_can_define_custom_exception()
    {
        static::expectException(\Psr\Log\InvalidArgumentException::class);

        Assert::that(true)
            ->orThrow(\Psr\Log\InvalidArgumentException::class)
            ->isBool()
            ->isFalse()
        ;
    }
}
