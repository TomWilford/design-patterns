<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Topping;

class PineappleTopping implements Topping
{
    public function getName(): string
    {
        return 'Pineapple';
    }

    public function getQuantity(): int
    {
        return 2;
    }

    public function getUnits(): string
    {
        return 'chunks';
    }
}
