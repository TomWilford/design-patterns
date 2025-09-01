<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete;

use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Button\MacButton;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Checkbox\MacCheckbox;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Interface\UiFactory;

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
