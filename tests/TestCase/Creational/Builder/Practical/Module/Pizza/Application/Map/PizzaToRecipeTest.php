<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Practical\Module\Pizza\Application\Map;

use Creational\Builder\Practical\Module\Pizza\Application\Map\PizzaToRecipe;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\ThinCrustMediumBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Pizza\Pizza;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Sauce\RedSauce;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping\MozzarellaTopping;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping\PepperoniTopping;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PizzaToRecipe::class)]
class PizzaToRecipeTest extends TestCase
{
    public function testInstantiation(): void
    {
        $sut = new PizzaToRecipe();
        $this->assertInstanceOf(PizzaToRecipe::class, $sut);
    }

    public function testBaseConvertsToString(): void
    {
        $pizzaMock = $this->createMock(Pizza::class);
        $pizzaMock->expects($this->any())->method('getBase')->willReturn(new ThinCrustMediumBase());
        $sut = new PizzaToRecipe();

        $result = $sut->convert($pizzaMock);

        $this->assertStringContainsString('400g dough rolled to 11"', $result);
    }

    public function testSauceConvertsToString(): void
    {
        $base = new ThinCrustMediumBase();
        $sauce = new RedSauce();
        $expected = $sauce->getVolumePerInch() * $base->getRolledDiameter();
        $pizzaMock = $this->createMock(Pizza::class);
        $pizzaMock->expects($this->any())->method('getBase')->willReturn($base);
        $pizzaMock->expects($this->any())->method('getSauce')->willReturn($sauce);
        $sut = new PizzaToRecipe();

        $result = $sut->convert($pizzaMock);

        $this->assertStringContainsString($expected . 'ml of Standard Red Sauce', $result);
    }

    public function testToppingsCovertToString(): void
    {
        $base = new ThinCrustMediumBase();
        $sauce = new RedSauce();
        $toppingA = new MozzarellaTopping();
        $toppingB = new PepperoniTopping();
        $expectedA = $toppingA->getQuantity() * $base->getRolledDiameter();
        $expectedB = $toppingB->getQuantity() * $base->getRolledDiameter();
        $pizzaMock = $this->createMock(Pizza::class);
        $pizzaMock->expects($this->any())->method('getBase')->willReturn($base);
        $pizzaMock->expects($this->any())->method('getSauce')->willReturn($sauce);
        $pizzaMock->expects($this->any())->method('getToppings')->willReturn([$toppingA, $toppingB]);
        $sut = new PizzaToRecipe();

        $result = $sut->convert($pizzaMock);

        $this->assertStringContainsString(
            $expectedA . ' ' . $toppingA->getUnits() . ' of ' . $toppingA->getName(),
            $result
        );
        $this->assertStringContainsString(
            $expectedB . ' ' . $toppingB->getUnits() . ' of ' . $toppingB->getName(),
            $result
        );
    }
}
