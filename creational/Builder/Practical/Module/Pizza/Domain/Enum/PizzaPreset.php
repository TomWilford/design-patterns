<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Enum;

use Creational\Builder\Practical\Module\Pizza\Application\Builder\Director\PizzaDirector;

enum PizzaPreset: string
{
    case MARGHERITA = 'margherita';
    case PEPPERONI = 'pepperoni';
    case HAWAIIAN = 'hawaiian';

    public function buildPizza(PizzaDirector $director, BaseSize $size, BaseStyle $style): void
    {
        switch ($this) {
            case self::MARGHERITA:
                $director->buildMargherita($size, $style);
                break;
            case self::PEPPERONI:
                $director->buildPepperoni($size, $style);
                break;
            case self::HAWAIIAN:
                $director->buildHawaiian($size, $style);
                break;
        }
    }
}
