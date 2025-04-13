<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Recommendation\Filter\Runner;

use Creational\Factory\Practical\Module\Recommendation\Filter\Runner\FilterRunner;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\EqualsRuleFactory;
use Fixtures\TestEntity;
use PHPUnit\Framework\TestCase;

class FilterRunnerTest extends TestCase
{
    private array $data = [];

    protected function setUp(): void
    {
        $this->data = [
            new TestEntity(1, 'Foo', 1),
            new TestEntity(2, 'Bar', 2),
            new TestEntity(3, 'Baz', 2),
        ];
    }

    public function testFilteringWithZeroRulesReturnsSameDataSet()
    {
        $sut = new FilterRunner();
        $this->assertEquals($this->data, $sut->runFilters($this->data));
    }

    public function testFilteringWithSingleRuleReturnsFilteredData()
    {
        $rule = (new EqualsRuleFactory('name', 'Bar'))->createRule();
        $rules = [$rule];

        $sut = new FilterRunner();
        $result = $sut->runFilters($this->data, $rules);

        $this->assertCount(1, $result);
        $this->assertSame($this->data[1], $result[array_key_first($result)]);
    }

    public function testFilteringWithMultipleRulesReturnsFilteredData()
    {
        $ruleA = (new EqualsRuleFactory('value', 2))->createRule();
        $ruleB = (new EqualsRuleFactory('name', 'Bar'))->createRule();
        $rules = [$ruleA, $ruleB];

        $sut = new FilterRunner();
        $result = $sut->runFilters($this->data, $rules);

        $this->assertCount(1, $result);
        $this->assertSame($this->data[1], $result[array_key_first($result)]);
    }
}
