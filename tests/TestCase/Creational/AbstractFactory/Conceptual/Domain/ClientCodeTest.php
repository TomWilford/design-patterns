<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Conceptual\Domain;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Domain\ClientCode;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Factory\Concrete\ConcreteFactory1;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Factory\Concrete\ConcreteFactory2;
use PHPUnit\Framework\TestCase;

class ClientCodeTest extends TestCase
{
    public function testConcreteFactory1ReturnsProduct1Strings()
    {
        $sut = new ClientCode(new ConcreteFactory1());

        $this->assertSame(
            'ConcreteProductA1: Feature "A" Activated' . PHP_EOL . 'ConcreteProductB1: Feature "B" Activated',
            $sut->execute()
        );
    }

    public function testConcreteFactory2ReturnsProduct2Strings()
    {
        $sut = new ClientCode(new ConcreteFactory2());

        $this->assertSame(
            'ConcreteProductA2: Feature "A" Activated' . PHP_EOL . 'ConcreteProductB2: Feature "B" Activated',
            $sut->execute()
        );
    }
}
