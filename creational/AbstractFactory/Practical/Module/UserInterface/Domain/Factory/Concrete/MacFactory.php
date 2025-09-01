<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Button\MacButton;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Checkbox\MacCheckbox;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Interface\UiFactory;

class MacFactory implements UiFactory
{
    public function createButton(): MacButton
    {
        return new MacButton();
    }

    public function createCheckbox(): MacCheckbox
    {
        return new MacCheckbox();
    }
}
