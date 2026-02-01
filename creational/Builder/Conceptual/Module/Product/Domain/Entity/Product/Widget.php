<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Colour;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Material;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;

class Widget extends AbstractProduct
{
    public function getMaterial(): ?Component
    {
        return $this->components['material'] ?? null;
    }

    public function getColour(): ?Component
    {
        return $this->components['colour'] ?? null;
    }
}
