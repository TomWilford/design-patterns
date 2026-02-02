<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Module\Product\Factory\Interface;

use Creational\AbstractFactory\Conceptual\Module\Product\Interface\ProductA;
use Creational\AbstractFactory\Conceptual\Module\Product\Interface\ProductB;

interface AbstractFactory
{
    public function createProductA(): ProductA;
    public function createProductB(): ProductB;
}
