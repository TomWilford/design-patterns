<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Action;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete\StandardProductBuilder;
use Creational\Builder\Conceptual\Module\Product\Application\Builder\Director\ProductBuildDirector;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product;

class PurchaseProductAction
{
    public function __construct(private ProductBuildDirector $director, private StandardProductBuilder $builder)
    {
    }

    public function __invoke(): Product
    {
        $this->director->setBuilder($this->builder);
        $this->director->buildPurchasedProduct();
        return $this->builder->getProduct();
    }
}
