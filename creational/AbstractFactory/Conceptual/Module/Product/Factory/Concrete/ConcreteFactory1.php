<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Entity\ConcreteProductA1;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Entity\ConcreteProductB1;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Factory\Interface\AbstractFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Interface\ProductA;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Interface\ProductB;

class ConcreteFactory1 implements AbstractFactory
{
    public function createProductA(): ProductA
    {
        return new ConcreteProductA1();
    }

    public function createProductB(): ProductB
    {
        return new ConcreteProductB1();
    }
}
