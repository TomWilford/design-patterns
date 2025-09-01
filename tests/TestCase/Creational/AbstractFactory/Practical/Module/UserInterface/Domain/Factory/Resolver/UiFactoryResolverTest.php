<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Resolver;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Domain\Os\Os;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete\MacFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete\WindowsFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Resolver\UiFactoryResolver;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class UiFactoryResolverTest extends TestCase
{
    public function testResolveSuccessfullyReturnsMacFactoryForMacEnum()
    {
        $sut = new UiFactoryResolver();
        $this->assertInstanceOf(MacFactory::class, $sut->resolve(Os::MAC));
    }

    public function testResolveSuccessfullyReturnsWindowsFactoryForWindowsEnum()
    {
        $sut = new UiFactoryResolver();
        $this->assertInstanceOf(WindowsFactory::class, $sut->resolve(Os::WINDOWS));
    }

    public function testResolveThrowsExceptionForInvalidEnum()
    {
        $sut = new UiFactoryResolver();
        $this->expectException(InvalidArgumentException::class);
        $sut->resolve(null);
    }
}
