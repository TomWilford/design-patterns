<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;

class ThinCrustSmallBase implements Base
{
    public function getName(): string
    {
        return 'Thin Crust - Small';
    }

    public function getDoughAmount(): int
    {
        return 250;
    }

    public function getRolledDiameter(): int
    {
        return 7;
    }
}
