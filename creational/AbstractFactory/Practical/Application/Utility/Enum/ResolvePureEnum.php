<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Application\Utility\Enum;

use Creational\AbstractFactory\Practical\Application\Exception\NotFoundException;

trait ResolvePureEnum
{
    public static function resolveOr404(string $value): self
    {
        foreach (self::cases() as $enum) {
            if (strcasecmp($enum->name, $value) === 0) {
                return $enum;
            }
        }

        throw new NotFoundException($value . ' is not a valid value for ' . static::class);
    }
}
