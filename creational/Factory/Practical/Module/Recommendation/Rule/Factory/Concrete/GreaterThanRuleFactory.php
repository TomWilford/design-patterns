<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete;

use Creational\Factory\Practical\Module\Recommendation\Rule\Entity\GreaterThanRule;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Abstract\RuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class GreaterThanRuleFactory extends RuleFactory
{
    public function createRule(): Rule
    {
        $rule = new GreaterThanRule();
        $rule->setEntityGetterToCompare($this->createGetterForPropertyToCompare());
        $rule->setMinimumValue($this->inputValueToCompare);
        return $rule;
    }
}
