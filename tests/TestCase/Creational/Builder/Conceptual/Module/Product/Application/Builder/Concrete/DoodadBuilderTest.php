<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete\DoodadBuilder;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Material;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Shape;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product\Doodad;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product\Widget;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DoodadBuilder::class)]
#[UsesClass(Widget::class)]
#[UsesClass(Shape::class)]
#[UsesClass(Material::class)]
class DoodadBuilderTest extends TestCase
{
    public function testCanCreateProduct(): void
    {
        $sut = new DoodadBuilder();
        $sut->createProduct();

        $result = $sut->getProduct();

        $this->assertInstanceOf(Doodad::class, $result);
    }

    public function testProductCanBeCreatedWithoutComponents(): void
    {
        $sut = new DoodadBuilder();
        $sut->createProduct();

        $result = $sut->getProduct();

        $this->assertSame("Doodad Details:\n", $result->getSpecification());
    }

    public function testProductCanBeCreatedWithComponents(): void
    {
        $sut = new DoodadBuilder();
        $sut->createProduct();
        $componentA = new Material('metal');
        $componentB = new Shape('round');

        $sut->addComponent($componentA);
        $sut->addComponent($componentB);
        $result = $sut->getProduct();

        $this->assertSame("Doodad Details:\n- Material: metal\n- Shape: round\n", $result->getSpecification());
    }
}
