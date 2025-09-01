<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Entity;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Interface\Product;

class ConcreteProductA implements Product
{
    public function operation(): string
    {
        return "Result of ConcreteProductA";
    }
}
