<?php

namespace Bytic\Assert\Assertions\Behaviors;

use Bytic\Assert\Assertions\Assertion;

trait HasRule
{
    public ?string $rule = null;
    public array $arguments = [];
    protected $hasRule = false;

    public function withRule(string $rule, $arguments = []): Assertion
    {
        $proxy = $this->rules[$rule];

        $this->rule = $proxy[1];
        $this->assertor = $proxy[0];

        $this->arguments = $arguments;
        $this->hasRule = true;
        return $this;
    }

    public function hasRule(): bool
    {
        return $this->hasRule;
    }
}