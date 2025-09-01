<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Domain;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Conceptual\Module\Product\Factory\Interface\AbstractFactory;

readonly class ClientCode
{
    public function __construct(private AbstractFactory $factory)
    {
    }

    public function execute(): string
    {
        return $this->factory->createProductA()->featureA() . PHP_EOL . $this->factory->createProductB()->featureB();
    }
}
