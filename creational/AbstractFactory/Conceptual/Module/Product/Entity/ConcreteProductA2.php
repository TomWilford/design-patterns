<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Entity;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Interface\ProductA;

class ConcreteProductA2 implements ProductA
{
    public function featureA(): string
    {
        return 'ConcreteProductA2: Feature "A" Activated';
    }
}
