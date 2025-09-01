<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Domain\Utility;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Interface\UiFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Interface\Button;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Interface\Checkbox;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Render\RenderUi;
use PHPUnit\Framework\TestCase;

class RenderUiTest extends TestCase
{
    public function testRenderReturnsButtons()
    {
        $buttonMock = $this->createMock(Button::class);
        $buttonMock->expects($this->once())
            ->method('render')
            ->willReturn('Button');
        $checkboxMock = $this->createMock(Checkbox::class);
        $checkboxMock->expects($this->once())
            ->method('render')
            ->willReturn('Checkbox');
        $factoryMock = $this->createMock(UiFactory::class);
        $factoryMock->expects($this->once())->method('createButton')->willReturn($buttonMock);
        $factoryMock->expects($this->once())->method('createCheckbox')->willReturn($checkboxMock);;
        $sut = new RenderUi($factoryMock);

        $this->assertEquals('Button' . PHP_EOL . 'Checkbox', $sut->render());
    }
}
