<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;

class DeepDishSmallBase implements Base
{
    public function getName(): string
    {
        return 'Deep Dish - Small';
    }

    public function getDoughAmount(): int
    {
        return 400;
    }

    public function getRolledDiameter(): int
    {
        return 7;
    }
}
