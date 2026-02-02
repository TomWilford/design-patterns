<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Interface;

use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Interface\Button;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Interface\Checkbox;

interface UiFactory
{
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}
