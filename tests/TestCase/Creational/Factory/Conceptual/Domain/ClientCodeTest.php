<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Conceptual\Domain;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Domain\ClientCode;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Creator\Concrete\ProductAFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Creator\Concrete\ProductBFactory;
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
