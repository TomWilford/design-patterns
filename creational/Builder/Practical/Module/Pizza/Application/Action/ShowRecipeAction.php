<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Application\Action;

use Creational\Builder\Practical\Module\Pizza\Application\Builder\Concrete\StandardPizzaBuilder;
use Creational\Builder\Practical\Module\Pizza\Application\Builder\Director\PizzaDirector;
use Creational\Builder\Practical\Module\Pizza\Application\Map\PizzaToRecipe;
use Creational\Builder\Practical\Module\Pizza\Domain\Enum\BaseSize;
use Creational\Builder\Practical\Module\Pizza\Domain\Enum\BaseStyle;
use Creational\Builder\Practical\Module\Pizza\Domain\Enum\PizzaPreset;

class ShowRecipeAction
{
    public function __construct(
        private PizzaDirector $director,
        private StandardPizzaBuilder $builder,
        private PizzaToRecipe $toRecipe
    ) {
    }

    /**
     * @param array{
     *     "size"?: string,
     *     "style"?: string,
     *     "type"?: string
     * } $request
     */
    public function __invoke(array $request = []): string
    {
        $this->director->setBuilder($this->builder);

        $size = BaseSize::from($request['size']);
        $style = BaseStyle::from($request['style']);
        $pizzaPreset = PizzaPreset::from($request['type']);
        $pizzaPreset->buildPizza($this->director, $size, $style);
        $pizza = $this->builder->getPizza();

        return $this->toRecipe->convert($pizza);
    }
}
