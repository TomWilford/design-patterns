<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Entity\ConcreteProductA2;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Entity\ConcreteProductB2;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Factory\Interface\AbstractFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Interface\ProductA;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Interface\ProductB;

class ConcreteFactory2 implements AbstractFactory
{
    public function createProductA(): ProductA
    {
        return new ConcreteProductA2();
    }

    public function createProductB(): ProductB
    {
        return new ConcreteProductB2();
    }
}
