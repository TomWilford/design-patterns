<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Conceptual\Module\Product\Application\Map;

use Creational\Builder\Conceptual\Module\Product\Application\Map\ComponentMapper;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Colour;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\ElectronicComponent;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Enum\ComponentType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use TypeError;
use ValueError;

#[CoversClass(ComponentMapper::class)]
class ComponentMapperTest extends TestCase
{
    public function testEmptyArrayProcessesWithoutError(): void
    {
        $sut = new ComponentMapper();

        $this->expectNotToPerformAssertions();
        $sut->stringsToObjects([]);
    }

    public function testInvalidTypeStringThrowsException(): void
    {
        $sut = new ComponentMapper();
        $this->expectException(ValueError::class);

        $sut->stringsToObjects(['foo' => 'bar']);
    }

    public function testInvalidValueThrowsException(): void
    {
        $sut = new ComponentMapper();
        $this->expectException(TypeError::class);

        $sut->stringsToObjects([ComponentType::ELECTRONIC_COMPONENT->value => 999]);
    }

    public function testStringArraySuccessfullyConvertedToObjectArray(): void
    {
        $sut = new ComponentMapper();

        $result = $sut->stringsToObjects([
            ComponentType::ELECTRONIC_COMPONENT->value => 'LED Light',
            ComponentType::COLOUR->value => 'red',
        ]);

        $this->assertEquals(
            [
                new ElectronicComponent('LED Light'),
                new Colour('red')
            ],
            $result
        );
    }
}
