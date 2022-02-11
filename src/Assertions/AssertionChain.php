<?php

namespace Bytic\Assert\Assertions;


use Bytic\Assert\Assertion;
use Bytic\Assert\Assertor\AssertorInterface;
use Bytic\Assert\Assertor\Assertors;

class AssertionChain
{
    use Behaviors\HasRulesProxy;

    public string $assertor;

    public $value;

    /**
     * @var Assertion[]
     */
    protected array $assertions = [];

    /**
     * Creates a new assertion.
     * @param mixed $value
     */
    public function __construct($value, $assertor)
    {
        $this->value = $value;
        $this->assertor = $assertor;
    }

    public function addRule($rule, $arguments = [])
    {
        $assertion = new Assertion($this->value, $this->assertor);
        $assertion->withRule($rule, $arguments);

        $this->add($assertion);
        return $this;
    }

    /**
     * @return $this
     */
    public function add(Assertion $assertion): self
    {
        $this->assertions[] = $assertion;
        end($this->assertions);
        return $this;
    }

    public function current(): Assertion
    {
        return current($this->assertions);
    }

    /**
     * @return Assertion[]
     */
    public function getAssertions(): array
    {
        return $this->assertions;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value): self
    {
        foreach ($this->assertions as $assertion) {
            $assertion->value = $value;
        }
        return $this;
    }

    public function __call($name, $arguments)
    {
        if ($this->isRule($name)) {
            $this->addRule($name, $arguments);
            return $this;
        }

        $current = $this->current();
        if (method_exists($current, $name)) {
            $current->$name(...$arguments);
            return $this;
        }

        return;
    }

    public function __destruct()
    {
        foreach ($this->assertions as $assertion) {
            $assertion->value = $this->value;
            Assertors::assert($assertion);
        }
    }
}
