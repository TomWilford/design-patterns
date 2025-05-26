<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\Product\Entity;

use Creational\AbstractFactory\Conceptual\Module\Product\Interface\ProductA;

class ConcreteProductA2 implements ProductA
{
    public function featureA(): string
    {
        return 'ConcreteProductA2: Feature "A" Activated';
    }
}
