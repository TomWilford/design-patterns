<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\Product\Entity;

use Creational\AbstractFactory\Conceptual\Module\Product\Interface\ProductB;

class ConcreteProductB2 implements ProductB
{
    public function featureB(): string
    {
        return 'ConcreteProductB2: Feature "B" Activated';
    }
}
