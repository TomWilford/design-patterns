<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Enum;

use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\DeepDishMediumBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\DeepDishSmallBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\ThinCrustLargeBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\ThinCrustMediumBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\ThinCrustSmallBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;

enum BaseSize: string
{
    case SMALL = 'small';
    case MEDIUM = 'medium';
    case LARGE = 'large';

    public function getBaseFromStyle(BaseStyle $style): Base
    {
        return match ($this) {
            self::SMALL => match ($style) {
                BaseStyle::THIN_CRUST => new ThinCrustSmallBase(),
                default => new DeepDishSmallBase()
            },
            self::MEDIUM => match ($style) {
                BaseStyle::THIN_CRUST => new ThinCrustMediumBase(),
                default => new DeepDishMediumBase()
            },
            self::LARGE => match ($style) {
                BaseStyle::THIN_CRUST => new ThinCrustLargeBase(),
                default => throw new \RuntimeException()
            }
        };
    }
}
