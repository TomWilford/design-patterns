<?php

declare(strict_types=1);

namespace Creational\Factory\Conceptual\Module\Product\Entity;

use Creational\Factory\Conceptual\Module\Product\Interface\Product;

class ConcreteProductB implements Product
{
    public function operation(): string
    {
        return "Result of ConcreteProductB";
    }
}
