<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Application\Map;

use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Pizza\Pizza;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Sauce;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Topping;

class PizzaToRecipe
{
    private Pizza $pizza;

    public function convert(Pizza $pizza): string
    {
        $this->pizza = $pizza;

        return sprintf(
            '%s' . PHP_EOL . '%s' . PHP_EOL . '%s',
            $this->getBaseString(),
            $this->getSauceString(),
            $this->getToppingsString()
        );
    }

    private function getBase(): Base
    {
        return $this->pizza->getBase();
    }

    private function getBaseString(): string
    {
        return $this->getBase()->getDoughAmount() . 'g dough rolled to ' . $this->getBase()->getRolledDiameter() . '"';
    }

    private function getSauce(): Sauce
    {
        return $this->pizza->getSauce();
    }

    private function getSauceVolumeForBase(): int
    {
        return $this->multiplyByBaseSize($this->getSauce()->getVolumePerInch());
    }

    private function getSauceString(): string
    {
        return $this->getSauceVolumeForBase() . 'ml of ' . $this->getSauce()->getName();
    }

    private function multiplyByBaseSize(int|float $amount): int|float
    {
        return $amount * $this->getBase()->getRolledDiameter();
    }

    /**
     * @return array<Topping>
     */
    private function getToppings(): array
    {
        return $this->pizza->getToppings();
    }

    private function getToppingAmountForBase(Topping $topping): int
    {
        return (int)round(
            num: $this->multiplyByBaseSize($topping->getQuantity()),
            mode: PHP_ROUND_HALF_UP
        );
    }

    private function getToppingsString(): string
    {
        $toppings = array_map(
            fn (Topping $topping): string => $this->getToppingAmountForBase($topping)
                . ' '
                . $topping->getUnits()
                . ' of '
                . $topping->getName(),
            $this->getToppings()
        );

        return implode(PHP_EOL, $toppings);
    }
}
