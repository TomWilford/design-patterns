<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Interface\ProductBuilder;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Product;

abstract class AbstractProductBuilder implements ProductBuilder
{
    protected Product $product;

    abstract public function createProduct(): void;

    public function addComponent(Component $component): void
    {
        $this->product->addComponent($component);
    }

    public function getProduct(): Product
    {
        $result = $this->product;
        $this->createProduct();
        return $result;
    }
}
