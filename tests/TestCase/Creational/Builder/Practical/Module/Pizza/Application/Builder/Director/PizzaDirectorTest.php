<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Practical\Module\Pizza\Application\Builder\Director;

use Creational\Builder\Practical\Module\Pizza\Application\Builder\Director\PizzaDirector;
use Creational\Builder\Practical\Module\Pizza\Application\Builder\Interface\PizzaBuilder;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Sauce\RedSauce;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping\MozzarellaTopping;
use Creational\Builder\Practical\Module\Pizza\Domain\Enum\BaseSize;
use Creational\Builder\Practical\Module\Pizza\Domain\Enum\BaseStyle;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PizzaDirector::class)]
class PizzaDirectorTest extends TestCase
{
    public function testInstantiation(): void
    {
        $sut = new PizzaDirector();
        $this->assertInstanceOf(PizzaDirector::class, $sut);
    }

    public function testBuildMargheritaSuccessfullyCreatesPizza(): void
    {
        $builderMock = $this->createMock(PizzaBuilder::class);
        $builderMock->expects($this->once())->method('newPizza');
        $builderMock->expects($this->once())->method('setBase');
        $builderMock->expects($this->once())->method('setSauce')->with(new RedSauce());
        $builderMock->expects($this->once())->method('addTopping')->with(new MozzarellaTopping());
        $sut = new PizzaDirector();
        $sut->setBuilder($builderMock);

        $sut->buildMargherita(BaseSize::MEDIUM, BaseStyle::THIN_CRUST);
    }

    public function testBuildPepperoniSuccessfullyCreatesPizza(): void
    {
        $builderMock = $this->createMock(PizzaBuilder::class);
        $builderMock->expects($this->once())->method('newPizza');
        $builderMock->expects($this->once())->method('setBase');
        $builderMock->expects($this->once())->method('setSauce')->with(new RedSauce());
        $builderMock->expects($this->exactly(2))->method('addTopping');
        $sut = new PizzaDirector();
        $sut->setBuilder($builderMock);

        $sut->buildPepperoni(BaseSize::MEDIUM, BaseStyle::THIN_CRUST);
    }

    public function testBuildHawaiianSuccessfullyCreatesPizza(): void
    {
        $builderMock = $this->createMock(PizzaBuilder::class);
        $builderMock->expects($this->once())->method('newPizza');
        $builderMock->expects($this->once())->method('setBase');
        $builderMock->expects($this->once())->method('setSauce')->with(new RedSauce());
        $builderMock->expects($this->exactly(3))->method('addTopping');
        $sut = new PizzaDirector();
        $sut->setBuilder($builderMock);

        $sut->buildHawaiian(BaseSize::MEDIUM, BaseStyle::THIN_CRUST);
    }
}
