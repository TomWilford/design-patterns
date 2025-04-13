<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Content\Application;

use Creational\Factory\Practical\Module\Content\Application\IndexAction;
use Creational\Factory\Practical\Module\Recommendation\Filter\Exception\InvalidFilterMethodException;
use Creational\Factory\Practical\Module\Recommendation\Filter\Runner\FilterRunner;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Resolver\RuleFactoryResolver;
use Fixtures\TestEntity;
use PHPUnit\Framework\TestCase;

class IndexActionTest extends TestCase
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

    public function testSingleRuleFiltersDataCorrectly(): void
    {
        $filterInputs = [
            [
                'filterProperty' => 'name',
                'filterMethod' => 'equals',
                'filterValue' => 'Foo'
            ]
        ];

        $sut = new IndexAction(new RuleFactoryResolver(), new FilterRunner());
        $result = $sut($filterInputs, $this->data);

        $this->assertCount(1, $result);
        $this->assertEquals($this->data[0], $result[array_key_first($result)]);
    }

    public function testMultipleRuleFiltersDataCorrectly(): void
    {
        $filterInputs = [
            [
                'filterProperty' => 'name',
                'filterMethod' => 'equals',
                'filterValue' => 'Bar'
            ],
            [
                'filterProperty' => 'value',
                'filterMethod' => 'greater_than',
                'filterValue' => 1
            ]
        ];

        $sut = new IndexAction(new RuleFactoryResolver(), new FilterRunner());
        $result = $sut($filterInputs, $this->data);

        $this->assertCount(1, $result);
        $this->assertEquals($this->data[1], $result[array_key_first($result)]);
    }

    public function testEmptyFiltersReturnsAllDataCorrectly(): void
    {
        $sut = new IndexAction(new RuleFactoryResolver(), new FilterRunner());
        $result = $sut([], $this->data);

        $this->assertCount(3, $result);
    }

    public function testExceptionThrownForInvalidFilter()
    {
        $filterInputs = [
            [
                'filterProperty' => 'name',
                'filterMethod' => 'foooo',
                'filterValue' => 'Foo'
            ]
        ];

        $sut = new IndexAction(new RuleFactoryResolver(), new FilterRunner());

        $this->expectException(InvalidFilterMethodException::class);
        $sut($filterInputs, $this->data);
    }
}
