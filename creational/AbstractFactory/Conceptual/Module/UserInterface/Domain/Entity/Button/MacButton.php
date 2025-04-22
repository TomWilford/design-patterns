<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Entity\Button;

use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Interface\Button;

class MacButton implements Button
{
    public function render(): string
    {
        return "Rendering a Mac-style Button";
    }
}
