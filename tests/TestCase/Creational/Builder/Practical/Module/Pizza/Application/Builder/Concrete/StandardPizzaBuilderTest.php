<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Practical\Module\Pizza\Application\Builder\Concrete;

use Creational\Builder\Practical\Module\Pizza\Application\Builder\Concrete\StandardPizzaBuilder;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\ThinCrustLargeBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Pizza\Pizza;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Sauce\RedSauce;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping\MozzarellaTopping;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Sauce;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Topping;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StandardPizzaBuilder::class)]
#[UsesClass(Pizza::class)]
#[UsesClass(ThinCrustLargeBase::class)]
#[UsesClass(RedSauce::class)]
#[UsesClass(MozzarellaTopping::class)]
class StandardPizzaBuilderTest extends TestCase
{
    public function testInstantiation(): void
    {
        $sut = new StandardPizzaBuilder();
        $this->assertInstanceOf(StandardPizzaBuilder::class, $sut);
    }

    public function testNewBlankPizzaCanBeCreated(): void
    {
        $sut = new StandardPizzaBuilder();

        $sut->newPizza();
        $result = $sut->getPizza();

        $this->assertEmpty($result->getToppings());
    }

    public function testSettingPropertyBeforeCreationThrowsException()
    {
        $sut = new StandardPizzaBuilder();

        $this->expectException(\Error::class);
        $sut->setBase(new ThinCrustLargeBase());
    }

    public function testBaseCanBeAdded(): void
    {
        $sut = new StandardPizzaBuilder();

        $sut->newPizza();
        $sut->setBase(new ThinCrustLargeBase());
        $result = $sut->getPizza();

        $this->assertInstanceOf(Base::class, $result->getBase());
    }

    public function testSauceCanBeAdded(): void
    {
        $sut = new StandardPizzaBuilder();

        $sut->newPizza();
        $sut->setSauce(new RedSauce());
        $result = $sut->getPizza();

        $this->assertInstanceOf(Sauce::class, $result->getSauce());
    }

    public function testToppingCanBeAdded(): void
    {
        $sut = new StandardPizzaBuilder();

        $sut->newPizza();
        $sut->addTopping(new MozzarellaTopping());
        $result = $sut->getPizza();

        $this->assertInstanceOf(Topping::class, $result->getToppings()[0]);
    }

    public function testNewPizzaCreatedAfterPizzaReturned(): void
    {
        $sut = new StandardPizzaBuilder();

        $sut->newPizza();
        $sut->addTopping(new MozzarellaTopping());
        $sut->getPizza();
        $result = $sut->getPizza();

        $this->assertEmpty($result->getToppings());
    }
}
