<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Builder\Director;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Interface\ProductBuilder;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;

class ProductDirector
{
    /**
     * @param array<Component> $components
     */
    public function buildProduct(ProductBuilder $builder, array $components = []): void
    {
        $builder->createProduct();
        foreach ($components as $component) {
            $builder->addComponent($component);
        }
    }
}
