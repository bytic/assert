<?php

namespace Bytic\Assert\Assertor;

class BaseAssertor extends AbstractAssertor
{
    use Checks\BooleanChecks;
    use Checks\NumericChecks;
    use Checks\StringChecks;

    /**
     * @param mixed $value
     * @param string $message
     */
    public function object($value, $message = null, $exception = null)
    {
        if (false === is_object($value)) {
            $this->reportInvalidArgument($message, $exception);
        }
    }

}
