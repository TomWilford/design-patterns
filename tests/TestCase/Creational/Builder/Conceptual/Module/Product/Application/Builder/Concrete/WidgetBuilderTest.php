<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete\WidgetBuilder;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Material;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Shape;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product\Widget;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(WidgetBuilder::class)]
#[UsesClass(Widget::class)]
#[UsesClass(Shape::class)]
#[UsesClass(Material::class)]
class WidgetBuilderTest extends TestCase
{
    public function testCanCreateProduct(): void
    {
        $sut = new WidgetBuilder();
        $sut->createProduct();

        $result = $sut->getProduct();

        $this->assertInstanceOf(Widget::class, $result);
    }

    public function testProductCanBeCreatedWithoutComponents(): void
    {
        $sut = new WidgetBuilder();
        $sut->createProduct();

        $result = $sut->getProduct();

        $this->assertSame("Widget Details:\n", $result->getSpecification());
    }

    public function testProductCanBeCreatedWithComponents(): void
    {
        $sut = new WidgetBuilder();
        $sut->createProduct();
        $componentA = new Material('metal');
        $componentB = new Shape('round');

        $sut->addComponent($componentA);
        $sut->addComponent($componentB);
        $result = $sut->getProduct();

        $this->assertSame("Widget Details:\n- Material: metal\n- Shape: round\n", $result->getSpecification());
    }
}
