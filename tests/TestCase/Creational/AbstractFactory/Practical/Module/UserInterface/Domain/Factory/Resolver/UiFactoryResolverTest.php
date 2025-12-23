<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Resolver;

use Creational\AbstractFactory\Practical\Domain\Os\Os;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete\MacFactory;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete\WindowsFactory;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Resolver\UiFactoryResolver;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UiFactoryResolver::class)]
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
