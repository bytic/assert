<?php

/**
 * Class MatchingBench
 * @Iterations(5)
 * @Revs(10000)
 * @BeforeMethods({"init"})
 */
class AssertingBench
{

    public function benchWebmozartIsBool()
    {
        \Webmozart\Assert\Assert::boolean(true);
        \Webmozart\Assert\Assert::true(true);
    }

    public function benchIsBool()
    {
        \Bytic\Assert\Assert::that(true)
            ->isBool()
            ->isTrue();
    }
    public function benchWebmozartIsString()
    {
        \Webmozart\Assert\Assert::string('test');
    }

    public function benchIsString()
    {
        \Bytic\Assert\Assert::that('string')
            ->isString();
    }

    public function init()
    {
    }
}
