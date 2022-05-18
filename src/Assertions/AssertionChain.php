<?php

namespace Bytic\Assert\Assertions;

use Bytic\Assert\Assertor\Assertors;

class AssertionChain
{
    use Behaviors\HasRulesProxy;
    use Behaviors\HasException;
    use Behaviors\HasAssertor;

    public string $assertor;

    public $value;

    /**
     * Creates a new assertion.
     * @param mixed $value
     */
    public function __construct($value, $assertor = null)
    {
        $this->value = $value;
        $this->setAssertor($assertor);
    }

    public function __call($name, $arguments)
    {
        if ($this->isRule($name)) {
            $this->runAssertion($name, $arguments);
        }
        return $this;
    }

    protected function runAssertion($name, $arguments)
    {
        $assertion = new Assertion($this->value, $this->assertor);
        $assertion->withRule($name, $arguments);

        $assertion->value = $this->value;
        $assertion->message = $this->message;
        $assertion->exception = $this->exception;

        Assertors::assert($assertion);
        return $this;
    }
}
