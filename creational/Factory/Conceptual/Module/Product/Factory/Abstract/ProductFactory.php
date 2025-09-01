<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Creator\Abstract;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Interface\Product;

abstract class ProductFactory
{
    abstract public function factoryMethod(): Product;

    public function someOperation(): string
    {
        $product = $this->factoryMethod();
        return "Factory: Working with " . $product->operation();
    }
}
