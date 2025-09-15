<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component;

readonly class Material extends AbstractComponent
{
    public function getType(): string
    {
        return 'material';
    }
}
