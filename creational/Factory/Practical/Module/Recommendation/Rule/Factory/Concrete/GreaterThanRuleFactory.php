<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Entity\GreaterThanRule;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Abstract\RuleFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

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
