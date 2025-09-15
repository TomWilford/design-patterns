<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Builder\Interface;

use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Product;

interface ProductBuilder
{
    public function createProduct(): void;
    public function addComponent(Component $component): void;
    public function getProduct(): Product;
}
