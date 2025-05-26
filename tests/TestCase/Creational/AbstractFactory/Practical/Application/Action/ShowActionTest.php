<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Application\Action;

use Creational\AbstractFactory\Practical\Application\Action\ShowAction;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Button\MacButton;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Button\WindowsButton;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Checkbox\MacCheckbox;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Entity\Checkbox\WindowsCheckbox;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete\MacFactory;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Concrete\WindowsFactory;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Resolver\UiFactoryResolver;
use PHPUnit\Framework\TestCase;

class ShowActionTest extends TestCase
{
    public function testPassingWindowsToRequestCorrectlyRendersWindowsFeatures()
    {
        $buttonMock = $this->createMock(WindowsButton::class);
        $buttonMock->expects($this->once())
            ->method('render')
            ->willReturn('Rendering a Windows-style Button');
        $checkboxMock = $this->createMock(WindowsCheckbox::class);
        $checkboxMock->expects($this->once())
            ->method('render')
            ->willReturn('Rendering a Windows-style Checkbox');;
        $factoryMock = $this->createMock(WindowsFactory::class);
        $factoryMock->expects($this->once())->method('createButton')->willReturn($buttonMock);
        $factoryMock->expects($this->once())->method('createCheckbox')->willReturn($checkboxMock);;
        $uiFactoryResolver = $this->createMock(UiFactoryResolver::class);
        $uiFactoryResolver->expects($this->once())->method('resolve')->willReturn($factoryMock);;

        $sut = new ShowAction($uiFactoryResolver);
        $response = $sut(['operatingSystem' => 'windows']);

        $this->assertSame(
            'Rendering a Windows-style Button' . PHP_EOL . 'Rendering a Windows-style Checkbox',
            $response
        );
    }

    public function testPassingMacToRequestCorrectlyRendersMacFeatures()
    {
        $buttonMock = $this->createMock(MacButton::class);
        $buttonMock->expects($this->once())
            ->method('render')
            ->willReturn('Rendering a Mac-style Button');
        $checkboxMock = $this->createMock(MacCheckbox::class);
        $checkboxMock->expects($this->once())
            ->method('render')
            ->willReturn('Rendering a Mac-style Checkbox');
        $factoryMock = $this->createMock(MacFactory::class);
        $factoryMock->expects($this->once())->method('createButton')->willReturn($buttonMock);
        $factoryMock->expects($this->once())->method('createCheckbox')->willReturn($checkboxMock);
        $uiFactoryResolver = $this->createMock(UiFactoryResolver::class);
        $uiFactoryResolver->expects($this->once())->method('resolve')->willReturn($factoryMock);;

        $sut = new ShowAction($uiFactoryResolver);
        $response = $sut(['operatingSystem' => 'mac']);

        $this->assertSame(
            'Rendering a Mac-style Button' . PHP_EOL . 'Rendering a Mac-style Checkbox',
            $response
        );
    }
}
