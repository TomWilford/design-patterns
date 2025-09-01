<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Entity;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Interface\ProductB;

class ConcreteProductB2 implements ProductB
{
    public function featureB(): string
    {
        return 'ConcreteProductB2: Feature "B" Activated';
    }
}
