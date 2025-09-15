<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product\Widget;

class WidgetBuilder extends AbstractProductBuilder
{
    public function createProduct(): void
    {
        $this->product = new Widget();
    }
}
