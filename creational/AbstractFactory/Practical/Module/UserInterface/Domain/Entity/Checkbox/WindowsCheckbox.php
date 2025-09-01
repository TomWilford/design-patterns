<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Checkbox;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Interface\Checkbox;

class WindowsCheckbox implements Checkbox
{
    public function render(): string
    {
        return "Rendering a Windows-style Checkbox";
    }
}
