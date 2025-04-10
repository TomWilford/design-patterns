<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete;

use Creational\Factory\Practical\Module\Recommendation\Rule\Entity\EqualsRule;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Abstract\RuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class EqualsRuleFactory extends RuleFactory
{
    public function createRule(): Rule
    {
        $rule = new EqualsRule();
        $rule->setEntityGetterToCompare($this->createGetterForPropertyToCompare());
        $rule->setExpectedValue($this->inputValueToCompare);
        return $rule;
    }
}
