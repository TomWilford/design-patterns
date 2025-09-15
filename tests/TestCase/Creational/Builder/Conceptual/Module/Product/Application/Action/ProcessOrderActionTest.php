<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Conceptual\Module\Product\Application\Action;

use Creational\Builder\Conceptual\Module\Product\Application\Action\ProcessOrderAction;
use Creational\Builder\Conceptual\Module\Product\Application\Builder\Director\ProductDirector;
use Creational\Builder\Conceptual\Module\Product\Application\Map\ComponentMapper;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Colour;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\ElectronicComponent;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Enum\ComponentType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ProcessOrderAction::class)]
#[UsesClass(ProductDirector::class)]
class ProcessOrderActionTest extends TestCase
{
    public function testEmptyArrayReturnedForNoLineItems(): void
    {
        $director = new ProductDirector();
        $mapperMock = $this->createMock(ComponentMapper::class);
        $sut = new ProcessOrderAction($director, $mapperMock);

        $result = $sut();

        $this->assertSame([], $result);
    }

    public function testStandardWidgetCanBeCreated(): void
    {
        $director = new ProductDirector();
        $mapperMock = $this->createMock(ComponentMapper::class);
        $sut = new ProcessOrderAction($director, $mapperMock);

        $result = $sut([
            [
                'type' => 'widget',
                'components' => []
            ]
        ]);

        $this->assertSame(<<<HTML
        Widget Details:
        - Size: medium
        - Material: plastic
        - Colour: blue

        HTML,
            $result[0]
        );
    }

    public function testCustomWidgetCanBeCreated(): void
    {
        $componentInput = [
            ComponentType::ELECTRONIC_COMPONENT->value => 'LED Light',
            ComponentType::COLOUR->value => 'red',
        ];
        $director = new ProductDirector();
        $mapperMock = $this->createMock(ComponentMapper::class);
        $mapperMock->expects($this->once())
            ->method('stringsToObjects')
            ->with($componentInput)->willReturn(
                [
                    new ElectronicComponent('LED Light'),
                    new Colour('red')
                ]
            );
        $sut = new ProcessOrderAction($director, $mapperMock);

        $result = $sut([
            [
                'type' => 'widget',
                'components' => $componentInput
            ]
        ]);

        $this->assertSame(<<<HTML
        Widget Details:
        - Electronic Component: LED Light
        - Colour: red

        HTML,
            $result[0]
        );
    }
}
