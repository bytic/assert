<?php

namespace Bytic\Assert\Assertions\Behaviors;

use Bytic\Assert\Assertion;
use Bytic\Assert\Assertor\BaseAssertor;
use Bytic\Assert\Assertor\WebmozartAssertor;

/**
 * @method Assertion isNull()
 * @method Assertion isBool()
 * @method Assertion isFalse()
 * @method Assertion isTrue()
 */
trait HasRulesProxy
{
    protected $rules = [
        "isNull" => [BaseAssertor::class, "null"],
        "isBool" => [BaseAssertor::class, "boolean"],
        "isFalse" => [BaseAssertor::class, "false"],
        "isTrue" => [BaseAssertor::class, "true"],
        "isString" => [WebmozartAssertor::class, "string"],
    ];

    protected function isRule($name): bool
    {
        return array_key_exists($name, $this->rules);
    }

}
