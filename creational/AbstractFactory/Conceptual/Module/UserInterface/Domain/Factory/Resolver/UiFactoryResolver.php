<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Factory\Resolver;

use Creational\AbstractFactory\Conceptual\Domain\Enum\Os;
use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Factory\Concrete\MacFactory;
use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Factory\Concrete\WindowsFactory;
use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Factory\Interface\UiFactory;

class UiFactoryResolver
{
    public function resolve(?Os $os): UiFactory
    {
        return match ($os) {
            Os::WINDOWS => new WindowsFactory(),
            Os::MAC => new MacFactory(),
            default => throw new \InvalidArgumentException('Invalid OS')
        };
    }
}
