<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Interface\ProductBuilder;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product\Doodad;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Product;

class DoodadBuilder extends AbstractProductBuilder
{
    public function createProduct(): void
    {
        $this->product = new Doodad();
    }
}
