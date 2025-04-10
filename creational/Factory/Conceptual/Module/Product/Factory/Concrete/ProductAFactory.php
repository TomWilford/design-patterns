<?php

declare(strict_types=1);

namespace Creational\Factory\Conceptual\Module\Product\Creator\Concrete;

use Creational\Factory\Conceptual\Module\Product\Creator\Abstract\ProductFactory;
use Creational\Factory\Conceptual\Module\Product\Entity\ConcreteProductA;
use Creational\Factory\Conceptual\Module\Product\Interface\Product;

class ProductAFactory extends ProductFactory
{
    public function factoryMethod(): Product
    {
        return new ConcreteProductA();
    }
}
