<?php

namespace Bytic\Assert\Assertions\Behaviors;

use Bytic\Assert\Assertor\BaseAssertor;

trait HasAssertor
{
    public string $assertor;

    /**
     * @param string|null $assertor
     */
    public function setAssertor(string $assertor = null): void
    {
        $this->assertor = $assertor ?? BaseAssertor::class;
    }

}