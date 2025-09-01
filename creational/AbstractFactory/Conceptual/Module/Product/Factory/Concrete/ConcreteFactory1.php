<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\Product\Factory\Concrete;

use Creational\AbstractFactory\Conceptual\Module\Product\Entity\ConcreteProductA1;
use Creational\AbstractFactory\Conceptual\Module\Product\Entity\ConcreteProductB1;
use Creational\AbstractFactory\Conceptual\Module\Product\Factory\Interface\AbstractFactory;
use Creational\AbstractFactory\Conceptual\Module\Product\Interface\ProductA;
use Creational\AbstractFactory\Conceptual\Module\Product\Interface\ProductB;

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
