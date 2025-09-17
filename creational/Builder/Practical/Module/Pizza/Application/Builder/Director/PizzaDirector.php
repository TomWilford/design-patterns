<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Application\Builder\Director;

use Creational\Builder\Practical\Module\Pizza\Application\Builder\Interface\PizzaBuilder;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Sauce\RedSauce;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping\HamTopping;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping\MozzarellaTopping;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping\PepperoniTopping;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Topping\PineappleTopping;
use Creational\Builder\Practical\Module\Pizza\Domain\Enum\BaseSize;
use Creational\Builder\Practical\Module\Pizza\Domain\Enum\BaseStyle;

class PizzaDirector
{
    private PizzaBuilder $builder;

    public function setBuilder(PizzaBuilder $builder): void
    {
        $this->builder = $builder;
    }

    public function buildMargherita(BaseSize $size, BaseStyle $style): void
    {
        $this->builder->newPizza();
        $this->builder->setBase($size->getBaseFromStyle($style));
        $this->builder->setSauce(new RedSauce());
        $this->builder->addTopping(new MozzarellaTopping());
    }

    public function buildPepperoni(BaseSize $size, BaseStyle $style): void
    {
        $this->builder->newPizza();
        $this->builder->setBase($size->getBaseFromStyle($style));
        $this->builder->setSauce(new RedSauce());
        $this->builder->addTopping(new MozzarellaTopping());
        $this->builder->addTopping(new PepperoniTopping());
    }

    public function buildHawaiian(BaseSize $size, BaseStyle $style): void
    {
        $this->builder->newPizza();
        $this->builder->setBase($size->getBaseFromStyle($style));
        $this->builder->setSauce(new RedSauce());
        $this->builder->addTopping(new MozzarellaTopping());
        $this->builder->addTopping(new HamTopping());
        $this->builder->addTopping(new PineappleTopping());
    }
}
