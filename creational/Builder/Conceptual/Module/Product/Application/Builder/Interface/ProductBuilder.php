<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Builder\Interface;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product;

interface ProductBuilder
{
    public function initialise(): void;
    public function addName(string $name): void;
    public function addDescription(string $description): void;
    public function addPrice(int $price): void;
    public function addQuantity(int $quantity): void;
    public function getProduct(): Product;
}
