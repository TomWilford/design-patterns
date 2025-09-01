<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\Product\Entity;

use Creational\AbstractFactory\Conceptual\Module\Product\Interface\ProductB;

class ConcreteProductB1 implements ProductB
{
    public function featureB(): string
    {
        return 'ConcreteProductB1: Feature "B" Activated';
    }
}
