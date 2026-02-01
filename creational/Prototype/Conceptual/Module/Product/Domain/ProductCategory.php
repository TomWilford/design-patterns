<?php

namespace Creational\Prototype\Conceptual\Module\Product\Domain;

readonly class ProductCategory
{
    public function __construct(
        private string $name,
        private string $type = 'General'
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
