<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Builder\Director;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Interface\ProductBuilder;

class ProductBuildDirector
{
    private ProductBuilder $builder;

    public function setBuilder(ProductBuilder $builder): void
    {
        $this->builder = $builder;
    }

    public function buildSaleableProduct(): void
    {
        $this->builder->initialise();
        $this->builder->addName('For Sale: Widget');
        $this->builder->addDescription('Please buy my widgets.');
        $this->builder->addPrice(100);
    }

    public function buildPurchasedProduct(): void
    {
        $this->builder->initialise();
        $this->builder->addName('Purchased: Widget');
        $this->builder->addDescription('Thank you for buying my widgets.');
        $this->builder->addPrice(100);
        $this->builder->addQuantity(2);
    }
}
