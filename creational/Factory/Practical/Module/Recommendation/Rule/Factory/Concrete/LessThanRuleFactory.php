<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete;

use Creational\Factory\Practical\Module\Recommendation\Rule\Entity\LessThanRule;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Abstract\RuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class LessThanRuleFactory extends RuleFactory
{
    public function createRule(): Rule
    {
        $rule = new LessThanRule();
        $rule->setEntityGetterToCompare($this->createGetterForPropertyToCompare());
        $rule->setMaximumValue($this->inputValueToCompare);
        return $rule;
    }
}
