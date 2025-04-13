<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete;

use Creational\Factory\Practical\Module\Recommendation\Filter\Entity\SingleRuleFilter;
use Creational\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete\SingleRuleFilterFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\EqualsRuleFactory;
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
