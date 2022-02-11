<?php

namespace Bytic\Assert\Assertions\Behaviors;

use Bytic\Assert\Assertion;
use Bytic\Assert\Assertor\BaseAssertor;
use Bytic\Assert\Assertor\WebmozartAssertor;

/**
 * @method Assertion isNull()
 * @method Assertion isString()
 * @method Assertion isInteger()
 * @method Assertion isPositiveInteger()
 * @method Assertion isFloat()
 * @method Assertion isNumeric()
 * @method Assertion isNatural()
 * @method Assertion isBool()
 * @method Assertion isFalse()
 * @method Assertion isTrue()
 * @method Assertion isObject()
 */
trait HasRulesProxy
{
    protected array $rules = [
        "isNull" => [BaseAssertor::class, "null"],
        "isString" => [BaseAssertor::class, "string"],
        "isInteger" => [BaseAssertor::class, "integer"],
        "isIntegerish" => [BaseAssertor::class, "integerish"],
        "isPositiveInteger" => [BaseAssertor::class, "positiveInteger"],
        "isFloat" => [BaseAssertor::class, "float"],
        "isNumeric" => [BaseAssertor::class, "numeric"],
        "isNatural" => [BaseAssertor::class, "natural"],
        "isBool" => [BaseAssertor::class, "boolean"],
        "isFalse" => [BaseAssertor::class, "false"],
        "isTrue" => [BaseAssertor::class, "true"],
        "isObject" => [BaseAssertor::class, "object"],
//        "isString" => [WebmozartAssertor::class, "string"],
    ];

    protected function isRule($name): bool
    {
        return array_key_exists($name, $this->rules);
    }

}
