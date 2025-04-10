<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Recommendation\Rule\Concrete;

use Creational\Factory\Practical\Module\Recommendation\Rule\Entity\GreaterThanRule;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\GreaterThanRuleFactory;
use Fixtures\TestEntity;
use PHPUnit\Framework\TestCase;

class GreaterThanRuleFactoryTest extends TestCase
{
    public function testRuleInstantiated()
    {
        $sut = new GreaterThanRuleFactory('name', 100);
        $rule = $sut->createRule();

        $this->assertInstanceOf(GreaterThanRule::class, $rule);
    }

    public function testInstantiatedRuleReturnsFalseForInvalidValue()
    {
        $entity = new TestEntity(
            1, 'Foo', 400
        );

        $sut = new GreaterThanRuleFactory('value', 450);
        $rule = $sut->createRule();

        $this->assertFalse($rule->compare($entity));
    }

    public function testInstantiatedRuleReturnsTrueForValidValue()
    {
        $entity = new TestEntity(
            1, 'Foo', 400
        );

        $sut = new GreaterThanRuleFactory('value', 100);
        $rule = $sut->createRule();

        $this->assertTrue($rule->compare($entity));
    }
}
