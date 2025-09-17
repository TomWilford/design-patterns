<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Application\Builder\Concrete;

use Creational\Builder\Practical\Module\Pizza\Application\Builder\Interface\PizzaBuilder;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Pizza\Pizza;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Sauce;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Topping;

class StandardPizzaBuilder implements PizzaBuilder
{
    private Pizza $pizza;

    public function newPizza(): void
    {
        $this->pizza = new Pizza();
    }

    public function setBase(Base $base): void
    {
        $this->pizza->setBase($base);
    }

    public function setSauce(Sauce $sauce): void
    {
        $this->pizza->setSauce($sauce);
    }

    public function addTopping(Topping $topping): void
    {
        $this->pizza->addTopping($topping);
    }

    public function getPizza(): Pizza
    {
        $result = $this->pizza;
        $this->newPizza();
        return $result;
    }
}
