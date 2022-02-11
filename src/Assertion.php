<?php

namespace Bytic\Assert;

use Bytic\Assert\Assertions\AssertionChain;
use Bytic\Assert\Assertor\Assertors;
use Bytic\Assert\Assertor\BaseAssertor;

class Assertion
{
    use Assertions\Behaviors\HasRule;
    use Assertions\Behaviors\HasRulesProxy;
    use Assertions\Behaviors\HasException;

    public string $assertor;

    public $value;

    public $message = null;

    /**
     * Creates a new assertion.
     * @param mixed $value
     */
    public function __construct($value, $assertor = null)
    {
        $this->value = $value;
        $this->assertor = $assertor ?? BaseAssertor::class;
    }

    public function orFail($failure): self
    {
        $this->message = $failure;
        return $this;
    }

    public function __call($name, $arguments)
    {
        if ($this->isRule($name)) {
            if (isset($this->rule)) {
                $chain = new AssertionChain($this->value, $this->assertor);
                $chain->add($this);
                return $chain->addRule($name);
            }
            $this->withRule($name, $arguments);
            return $this;
        }
    }

    public function __destruct()
    {
        Assertors::assert($this);
    }
}
