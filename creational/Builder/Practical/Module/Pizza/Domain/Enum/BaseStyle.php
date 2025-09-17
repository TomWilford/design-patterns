<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Enum;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;

enum BaseStyle: string
{
    case THIN_CRUST = 'thin_crust';
    case DEEP_DISH = 'deep_dish';

    public function getBaseFromSize(BaseSize $baseSize): Base
    {
        return $baseSize->getBaseFromStyle($this);
    }
}
