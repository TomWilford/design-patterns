<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Interface;

interface Base
{
    public function getName(): string;
    public function getDoughAmount(): int;

    public function getRolledDiameter(): int;
}
