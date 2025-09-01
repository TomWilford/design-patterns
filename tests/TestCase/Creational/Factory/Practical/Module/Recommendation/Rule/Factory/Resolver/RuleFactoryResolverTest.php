<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Resolver;

use Creational\Factory\Practical\Module\Recommendation\Rule\Entity\EqualsRule;
use Creational\Factory\Practical\Module\Recommendation\Rule\Entity\GreaterThanRule;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Abstract\RuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Resolver\RuleFactoryResolver;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;
use PHPUnit\Framework\TestCase;

class RuleFactoryResolverTest extends TestCase
{
    public function testEqualsFilterReturnedForEqualsSelection()
    {
        $sut = new RuleFactoryResolver();

        $result = $sut->resolveRules([
            [
                'filterProperty' => 'name',
                'filterMethod' => 'equals',
                'filterValue' => 'Foo'
            ]
        ]);

        $this->assertCount(1, $result);
        $this->assertInstanceOf(EqualsRule::class, $result[array_key_first($result)]);
    }

    public function testMultipleRulesOfDifferentTypesReturnedForMultipleSelections()
    {
        $sut = new RuleFactoryResolver();
        $result = $sut->resolveRules([
            [
                'filterProperty' => 'name',
                'filterMethod' => 'equals',
                'filterValue' => 'Foo'
            ],
            [
                'filterProperty' => 'value',
                'filterMethod' => 'greater_than',
                'filterValue' => '2'
            ]
        ]);

        $this->assertCount(2, $result);
        $this->assertInstanceOf(EqualsRule::class, $result[array_key_first($result)]);
        $this->assertInstanceOf(GreaterThanRule::class, $result[array_key_last($result)]);
    }
}
