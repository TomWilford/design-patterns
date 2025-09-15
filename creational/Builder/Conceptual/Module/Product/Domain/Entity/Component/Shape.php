<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component\AbstractComponent;

readonly class Shape extends AbstractComponent
{
    public function getType(): string
    {
        return 'shape';
    }
}
