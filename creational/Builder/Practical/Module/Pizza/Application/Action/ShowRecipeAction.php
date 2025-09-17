<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Application\Action;

use Creational\Builder\Practical\Module\Pizza\Application\Builder\Concrete\StandardPizzaBuilder;
use Creational\Builder\Practical\Module\Pizza\Application\Builder\Director\PizzaDirector;
use Creational\Builder\Practical\Module\Pizza\Application\Map\PizzaToRecipe;

class ShowRecipeAction
{
    public function __construct(
        private PizzaDirector $director,
        private StandardPizzaBuilder $builder,
        private PizzaToRecipe $toRecipe
    ) {
    }

    public function __invoke()
    {
        $this->director->setBuilder($this->builder);
        $this->director->buildMargherita();
        $pizza = $this->builder->getPizza();
        // TODO: Implement __invoke() method.
    }
}
