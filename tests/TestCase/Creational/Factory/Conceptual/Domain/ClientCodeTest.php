<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Conceptual\Domain;

use Creational\Factory\Conceptual\Domain\ClientCode;
use Creational\Factory\Conceptual\Module\Product\Creator\Concrete\ProductAFactory;
use Creational\Factory\Conceptual\Module\Product\Creator\Concrete\ProductBFactory;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[UsesClass(ClientCode::class)]
class ClientCodeTest extends TestCase
{
    public function testConcreteCreatorAReturnsProductAString()
    {
        $sut = new ClientCode(new ProductAFactory());

        $this->assertSame(
            'Factory: Working with Result of ConcreteProductA',
            $sut->execute()
        );
    }

    public function testConcreteCreateBReturnsProductBString()
    {
        $sut = new ClientCode(new ProductBFactory());
        $this->assertSame(
            'Factory: Working with Result of ConcreteProductB',
            $sut->execute()
        );
    }
}
