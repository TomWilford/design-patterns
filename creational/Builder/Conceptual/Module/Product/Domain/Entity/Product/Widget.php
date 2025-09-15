<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Colour;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Material;

class Widget extends AbstractProduct
{
    public function getMaterial(): ?Material
    {
        return $this->components['material'] ?? null;
    }

    public function getColour(): ?Colour
    {
        return $this->components['colour'] ?? null;
    }
}
