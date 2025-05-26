<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Domain;

use Creational\AbstractFactory\Conceptual\Module\Product\Factory\Interface\AbstractFactory;

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
