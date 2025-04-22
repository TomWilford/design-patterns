<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Entity\Button;

use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Interface\Button;

class WindowsButton implements Button
{
    public function render(): string
    {
        return "Rendering a Windows-style Button";
    }
}
