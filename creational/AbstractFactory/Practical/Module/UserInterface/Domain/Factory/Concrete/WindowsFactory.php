<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Button\WindowsButton;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Checkbox\WindowsCheckbox;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Interface\UiFactory;

class WindowsFactory implements UiFactory
{
    public function createButton(): WindowsButton
    {
        return new WindowsButton();
    }

    public function createCheckbox(): WindowsCheckbox
    {
        return new WindowsCheckbox();
    }
}
