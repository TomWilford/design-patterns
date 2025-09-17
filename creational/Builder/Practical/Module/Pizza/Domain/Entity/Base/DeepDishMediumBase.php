<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;

class DeepDishMediumBase implements Base
{
    public function getName(): string
    {
        return 'Deep Dish - Medium';
    }

    public function getDoughAmount(): int
    {
        return 600;
    }

    public function getRolledDiameter(): int
    {
        return 11;
    }
}
