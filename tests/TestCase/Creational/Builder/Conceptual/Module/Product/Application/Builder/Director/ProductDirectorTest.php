<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Conceptual\Module\Product\Application\Builder\Director;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete\WidgetBuilder;
use Creational\Builder\Conceptual\Module\Product\Application\Builder\Director\ProductDirector;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Material;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Shape;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ProductDirector::class)]
#[UsesClass(WidgetBuilder::class)]
#[UsesClass(Shape::class)]
#[UsesClass(Material::class)]
class ProductDirectorTest extends TestCase
{
    public function testDirectorCallsCreateMethod(): void
    {
        $builderSpy = $this->createMock(WidgetBuilder::class);
        $builderSpy->expects($this->once())->method('createProduct');
        $sut = new ProductDirector();

        $sut->buildProduct($builderSpy);
    }

    public function testDirectorCallsAddComponentForEachComponent(): void
    {
        $builderSpy = $this->createMock(WidgetBuilder::class);
        $builderSpy->expects($this->once())->method('createProduct');
        $builderSpy->expects($this->exactly(2))->method('addComponent');
        $sut = new ProductDirector();

        $sut->buildProduct($builderSpy, [new Shape('round'), new Material('iron')]);
    }
}
