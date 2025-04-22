<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Entity\Checkbox;

use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Interface\Checkbox;

class WindowsCheckbox implements Checkbox
{
    public function render(): string
    {
        return "Rendering a Windows-style Checkbox";
    }
}
