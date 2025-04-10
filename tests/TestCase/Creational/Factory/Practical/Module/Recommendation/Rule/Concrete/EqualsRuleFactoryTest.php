<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Recommendation\Rule\Concrete;

use Creational\Factory\Practical\Module\Recommendation\Rule\Entity\EqualsRule;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\EqualsRuleFactory;
use Fixtures\TestEntity;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[UsesClass(EqualsRuleFactory::class)]
class EqualsRuleFactoryTest extends TestCase
{
    public function testRuleInstantiated()
    {
        $sut = new EqualsRuleFactory('name', 'Baa');
        $rule = $sut->createRule();

        $this->assertInstanceOf(EqualsRule::class, $rule);
    }

    public function testInstantiatedRuleReturnsFalseForInvalidValue()
    {
        $entity = new TestEntity(
            1, 'Foo', 400
        );

        $sut = new EqualsRuleFactory('name', 'Baa');
        $rule = $sut->createRule();

        $this->assertFalse($rule->compare($entity));
    }

    public function testInstantiatedRuleReturnsTrueForValidValue()
    {
        $entity = new TestEntity(
            1, 'Foo', 400
        );

        $sut = new EqualsRuleFactory('name', 'Foo');
        $rule = $sut->createRule();

        $this->assertTrue($rule->compare($entity));
    }
}
