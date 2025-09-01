<?php

declare(strict_types=1);

namespace Creational\Factory\Conceptual\Module\Product\Factory\Abstract;

use Creational\Factory\Conceptual\Module\Product\Interface\Product;

abstract class ProductFactory
{
    abstract public function factoryMethod(): Product;

    public function someOperation(): string
    {
        $product = $this->factoryMethod();
        return "Factory: Working with " . $product->operation();
    }
}
