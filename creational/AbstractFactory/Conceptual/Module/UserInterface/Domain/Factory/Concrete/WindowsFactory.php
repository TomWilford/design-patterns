<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Factory\Concrete;

use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Entity\Button\WindowsButton;
use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Entity\Checkbox\WindowsCheckbox;
use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Factory\Interface\UiFactory;

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
