<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Interface;

interface Button
{
    public function render(): string;
}
