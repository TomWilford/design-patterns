<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Domain;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Conceptual\Module\Product\Creator\Abstract\ProductFactory;

readonly class ClientCode
{
    public function __construct(private ProductFactory $factory)
    {
        //
    }

    public function execute(): string
    {
        return $this->factory->someOperation();
    }
}
