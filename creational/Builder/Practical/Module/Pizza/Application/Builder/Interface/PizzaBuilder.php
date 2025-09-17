<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Application\Builder\Interface;

use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Pizza\Pizza;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Sauce;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Topping;

interface PizzaBuilder
{
    public function newPizza(): void;

    public function setBase(Base $base): void;

    public function setSauce(Sauce $sauce): void;

    public function addTopping(Topping $topping): void;

    public function getPizza(): Pizza;
}
