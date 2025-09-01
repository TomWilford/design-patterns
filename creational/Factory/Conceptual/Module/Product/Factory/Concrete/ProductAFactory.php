<?php

declare(strict_types=1);

namespace Creational\Factory\Conceptual\Module\Product\Factory\Concrete;

use Creational\Factory\Conceptual\Module\Product\Factory\Abstract\ProductFactory;
use Creational\Factory\Conceptual\Module\Product\Entity\ConcreteProductA;
use Creational\Factory\Conceptual\Module\Product\Interface\Product;

class ProductAFactory extends ProductFactory
{
    public function factoryMethod(): Product
    {
        return new ConcreteProductA();
    }
}
