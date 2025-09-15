<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\ElectronicComponent;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Shape;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Texture;

class Doodad extends AbstractProduct
{
    public function getShape(): ?Shape
    {
        return $this->components['shape'] ?? null;
    }

    public function getTexture(): ?Texture
    {
        return $this->components['texture'] ?? null;
    }

    public function getElectronicComponent(): ?ElectronicComponent
    {
        return $this->components['electronicComponent'] ?? null;
    }
}
