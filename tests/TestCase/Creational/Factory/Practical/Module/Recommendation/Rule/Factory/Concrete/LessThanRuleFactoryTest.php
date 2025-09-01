<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Entity\LessThanRule;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\LessThanRuleFactory;
use Fixtures\TestEntity;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[UsesClass(LessThanRuleFactory::class)]
class LessThanRuleFactoryTest extends TestCase
{
    public function testRuleInstantiated()
    {
        $sut = new LessThanRuleFactory('name', 100);
        $rule = $sut->createRule();

        $this->assertInstanceOf(LessThanRule::class, $rule);
    }

    public function testInstantiatedRuleReturnsFalseForInvalidValue()
    {
        $entity = new TestEntity(
            1, 'Foo', 400
        );

        $sut = new LessThanRuleFactory('value', 100);
        $rule = $sut->createRule();

        $this->assertFalse($rule->compare($entity));
    }

    public function testInstantiatedRuleReturnsTrueForValidValue()
    {
        $entity = new TestEntity(
            1, 'Foo', 400
        );

        $sut = new LessThanRuleFactory('value', 450);
        $rule = $sut->createRule();

        $this->assertTrue($rule->compare($entity));
    }
}
