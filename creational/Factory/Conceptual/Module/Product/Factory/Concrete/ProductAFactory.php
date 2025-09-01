<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Creator\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Creator\Abstract\ProductFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Entity\ConcreteProductA;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Interface\Product;

class ProductAFactory extends ProductFactory
{
    public function factoryMethod(): Product
    {
        return new ConcreteProductA();
    }
}
