<?php

declare(strict_types=1);

namespace Creational\Factory\Conceptual\Module\Product\Creator\Abstract;

use Creational\Factory\Conceptual\Module\Product\Interface\Product;

abstract class Creator
{
    abstract public function factoryMethod(): Product;

    public function someOperation(): string
    {
        $product = $this->factoryMethod();
        return "Creator: Working with " . $product->operation();
    }
}
