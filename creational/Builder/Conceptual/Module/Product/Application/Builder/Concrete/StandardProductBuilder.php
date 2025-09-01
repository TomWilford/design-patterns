<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Interface\ProductBuilder;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product;

class StandardProductBuilder implements ProductBuilder
{
    private Product $product;

    public function initialise(): void
    {
        $this->product = new Product();
    }

    public function addName(string $name): void
    {
        $this->product->setName($name);
    }

    public function addDescription(string $description): void
    {
        $this->product->setDescription($description);
    }

    public function addPrice(int $price): void
    {
        $this->product->setPrice($price);
    }

    public function addQuantity(int $quantity): void
    {
        $this->product->setQuantity($quantity);
    }

    public function getProduct(): Product
    {
        $result = $this->product;
        $this->initialise();
        return $result;
    }
}
