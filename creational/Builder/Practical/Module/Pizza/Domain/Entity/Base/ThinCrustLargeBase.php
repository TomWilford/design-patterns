<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;

class ThinCrustLargeBase implements Base
{
    public function getName(): string
    {
        return 'Thin Crust - Large';
    }

    public function getDoughAmount(): int
    {
        return 600;
    }

    public function getRolledDiameter(): int
    {
        return 17;
    }
}
