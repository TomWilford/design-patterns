<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\ElectronicComponent;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Shape;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Texture;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;

class Doodad extends AbstractProduct
{
    public function getShape(): ?Component
    {
        return $this->components['shape'] ?? null;
    }

    public function getTexture(): ?Component
    {
        return $this->components['texture'] ?? null;
    }

    public function getElectronicComponent(): ?Component
    {
        return $this->components['electronicComponent'] ?? null;
    }
}
