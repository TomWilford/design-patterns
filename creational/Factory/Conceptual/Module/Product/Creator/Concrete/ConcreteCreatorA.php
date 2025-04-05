<?php

declare(strict_types=1);

namespace Creational\Factory\Conceptual\Module\Product\Creator\Concrete;

use Creational\Factory\Conceptual\Module\Product\Creator\Abstract\Creator;
use Creational\Factory\Conceptual\Module\Product\Entity\ConcreteProductA;
use Creational\Factory\Conceptual\Module\Product\Interface\Product;

class ConcreteCreatorA extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProductA();
    }
}
