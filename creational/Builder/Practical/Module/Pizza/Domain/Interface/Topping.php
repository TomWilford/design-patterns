<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Interface;

interface Topping
{
    public function getName(): string;

    public function getQuantity(): int|float;

    public function getUnits(): string;
}
