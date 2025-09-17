<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Interface;

interface Sauce
{
    public function getName(): string;
    public function getVolumePerInch(): int;
}
