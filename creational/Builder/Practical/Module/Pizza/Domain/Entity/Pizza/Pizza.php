<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Pizza;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Base;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Sauce;
use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Topping;

class Pizza
{
    private Base $base;
    private Sauce $sauce;
    /**
     * @var array<Topping>
     */
    private array $toppings = [];

    public function getBase(): Base
    {
        return $this->base;
    }

    public function setBase(Base $base): void
    {
        $this->base = $base;
    }

    public function getSauce(): Sauce
    {
        return $this->sauce;
    }

    public function setSauce(Sauce $sauce): void
    {
        $this->sauce = $sauce;
    }

    /**
     * @return array<Topping>
     */
    public function getToppings(): array
    {
        return $this->toppings;
    }

    public function addTopping(Topping $topping): void
    {
        $this->toppings[] = $topping;
    }
}
