<?php

namespace Bytic\Assert\Assertions;

use Bytic\Assert\Assertor\Assertors;

class Assertion
{
    use Behaviors\HasRule;
    use Behaviors\HasRulesProxy;
    use Behaviors\HasException;
    use Behaviors\HasAssertor;

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
}
