<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete;

use Creational\Factory\Practical\Module\Recommendation\Rule\Entity\EqualsRule;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\EqualsRuleFactory;
use Fixtures\TestEntity;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[UsesClass(EqualsRuleFactory::class)]
class EqualsRuleFactoryTest extends TestCase
{
    public function testRuleInstantiatedSuccessfully()
    {
        $sut = new EqualsRuleFactory('name', 'Baa');
        $rule = $sut->createRule();

        $this->assertInstanceOf(EqualsRule::class, $rule);
    }

    public function testRuleComparisonReturnsFalseForInvalidValue()
    {
        $entity = new TestEntity(
            1, 'Foo', 400
        );

        $sut = new EqualsRuleFactory('name', 'Baa');
        $rule = $sut->createRule();

        $this->assertFalse($rule->compare($entity));
    }

    public function testRuleComparisonReturnsTrueForValidValue()
    {
        $entity = new TestEntity(
            1, 'Foo', 400
        );

        $sut = new EqualsRuleFactory('name', 'Foo');
        $rule = $sut->createRule();

        $this->assertTrue($rule->compare($entity));
    }
}
