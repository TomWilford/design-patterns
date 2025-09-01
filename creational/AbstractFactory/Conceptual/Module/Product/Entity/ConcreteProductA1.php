<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\Product\Entity;

use Creational\AbstractFactory\Conceptual\Module\Product\Interface\ProductA;

class ConcreteProductA1 implements ProductA
{
    public function featureA(): string
    {
        return 'ConcreteProductA1: Feature "A" Activated';
    }
}
