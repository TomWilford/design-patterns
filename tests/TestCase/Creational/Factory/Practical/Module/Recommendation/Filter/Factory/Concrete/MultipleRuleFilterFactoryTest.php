<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Entity\MultipleRuleFilter;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete\MultipleRuleFilterFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\EqualsRuleFactory;
use PHPUnit\Framework\TestCase;

class MultipleRuleFilterFactoryTest extends TestCase
{
    public function testMultipleRuleFilterFactoryInstantiatesWhenProvidedWithRule()
    {
        $ruleFactory = new EqualsRuleFactory('name', 'Baa');
        $ruleA = $ruleFactory->createRule();
        $ruleB = $ruleFactory->createRule();

        $sut = new MultipleRuleFilterFactory([$ruleA, $ruleB]);

        $this->assertInstanceOf(MultipleRuleFilter::class, $sut->getFilterStrategy());
    }
}
