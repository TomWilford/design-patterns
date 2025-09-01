<?php

declare(strict_types=1);

namespace Creational\Factory\Conceptual\Domain;

use Creational\Factory\Conceptual\Module\Product\Factory\Abstract\ProductFactory;

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
