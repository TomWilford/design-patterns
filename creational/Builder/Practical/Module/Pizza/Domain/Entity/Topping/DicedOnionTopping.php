<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Topping;

class DicedOnionTopping implements Topping
{
    public function getName(): string
    {
        return 'Diced Onion';
    }

    public function getQuantity(): int
    {
        return 1;
    }

    public function getUnits(): string
    {
        return 'tablespoons';
    }
}
