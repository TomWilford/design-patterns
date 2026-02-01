<?php

namespace Creational\Prototype\Conceptual\Module\Product\Infrastructure;

use Creational\Prototype\Conceptual\Application\Interface\Prototype;
use Creational\Prototype\Conceptual\Module\Product\Domain\Product;

class ProductPrototypeRegistry
{
    /**
     * @var array<Product>
     */
    private array $prototypes = [];

    public function addPrototype(string $key, Product $prototype): void
    {
        $this->prototypes[$key] = $prototype;
    }

    public function createFromPrototype(string $key): ?Product
    {
        $prototype = $this->prototypes[$key] ?? throw new \RuntimeException("Prototype not found");

        return $prototype->clone();
    }
}
