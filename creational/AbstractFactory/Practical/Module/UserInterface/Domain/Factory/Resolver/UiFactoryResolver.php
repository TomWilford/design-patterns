<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Resolver;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Domain\Os\Os;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete\MacFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete\WindowsFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Interface\UiFactory;

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
