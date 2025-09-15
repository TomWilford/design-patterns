<?php

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Enum;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Colour;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\ElectronicComponent;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Material;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Shape;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Size;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Texture;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;

enum ComponentType: string
{
    case COLOUR = 'colour';
    case ELECTRONIC_COMPONENT = 'electronic_component';
    case MATERIAL = 'material';
    case SHAPE = 'shape';
    case SIZE = 'size';
    case TEXTURE = 'texture';

    public function createWithValue(string $value): Component
    {
        return match ($this) {
            self::COLOUR => new Colour($value),
            self::ELECTRONIC_COMPONENT => new ElectronicComponent($value),
            self::MATERIAL => new Material($value),
            self::SHAPE => new Shape($value),
            self::SIZE => new Size($value),
            self::TEXTURE => new Texture($value)
        };
    }
}
