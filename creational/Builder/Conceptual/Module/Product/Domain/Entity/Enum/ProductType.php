<?php

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Enum;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete\DoodadBuilder;
use Creational\Builder\Conceptual\Module\Product\Application\Builder\Concrete\WidgetBuilder;
use Creational\Builder\Conceptual\Module\Product\Application\Builder\Interface\ProductBuilder;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Colour;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\ElectronicComponent;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Material;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Shape;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Size;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\Texture;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;

enum ProductType: string
{
    case WIDGET = 'widget';
    case DOODAD = 'doodad';

    public function getBuilder(): ProductBuilder
    {
        return match ($this) {
            self::WIDGET => new WidgetBuilder(),
            self::DOODAD => new DoodadBuilder(),
        };
    }

    /**
     * @return array<Component>
     */
    public function getStandardComponents(): array
    {
        return match ($this) {
            self::WIDGET => [
                new Size('medium'),
                new Material('plastic'),
                new Colour('blue'),
            ],
            self::DOODAD => [
                new Size('medium'),
                new Shape('square'),
                new Texture('brushed'),
                new ElectronicComponent('LED Light'),
            ]
        };
    }
}
