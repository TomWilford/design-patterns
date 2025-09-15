<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Interface;

interface Product
{
    public function addComponent(Component $component): void;
    public function getSpecification(): string;
}
