<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Entity\SingleRuleFilter;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete\SingleRuleFilterFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\EqualsRuleFactory;
use PHPUnit\Framework\TestCase;

class SingleRuleFilterFactoryTest extends TestCase
{
    public function testSingleRuleFilterFactoryInstantiatesWhenProvidedWithRule()
    {
        $ruleFactory = new EqualsRuleFactory('name', 'Baa');
        $rule = $ruleFactory->createRule();

        $sut = new SingleRuleFilterFactory($rule);

        $this->assertInstanceOf(SingleRuleFilter::class, $sut->getFilterStrategy());
    }
}
