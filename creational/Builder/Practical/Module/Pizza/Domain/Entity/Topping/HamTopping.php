<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Topping;

class HamTopping implements Topping
{
    public function getName(): string
    {
        return 'Ham';
    }

    public function getQuantity(): float
    {
        return 0.5;
    }

    public function getUnits(): string
    {
        return 'slices';
    }
}
