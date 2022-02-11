<?php


namespace Bytic\Assert\Assertor;

use Webmozart\Assert\Assert;

class WebmozartAssertor extends AbstractAssertor
{
    public const NAME = 'Webmozart';

    public function __call($name, $arguments)
    {
        $exceptionClass = array_pop($arguments);
        try {
            call_user_func_array(Assert::class . '::' . $name, $arguments);
        } catch (\Exception $exception) {
            if ($exceptionClass === null) {
                throw $exception;
            }
            $this->wrapException($exception, $exceptionClass);
        }
    }

    protected function wrapException(\Exception $exception, $exceptionClass)
    {
        if (class_exists($exceptionClass)) {
            throw new $exceptionClass($exception->getMessage());
        }

        throw $exception;
    }
}
