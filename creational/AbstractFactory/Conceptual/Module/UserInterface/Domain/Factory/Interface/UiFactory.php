<?php

namespace Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Factory\Interface;

use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Interface\Button;
use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Interface\Checkbox;

interface UiFactory
{
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}
