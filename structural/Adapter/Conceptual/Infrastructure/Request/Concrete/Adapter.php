<?php

declare(strict_types=1);

namespace Structural\Adapter\Conceptual\Infrastructure\Request\Concrete;

use Structural\Adapter\Conceptual\Infrastructure\Request\Interface\Target;
use Structural\Adapter\Conceptual\Module\Adaptee\Infrastructure\Request\Adaptee;

class Adapter implements Target
{
    public function __construct(private Adaptee $adaptee)
    {
    }

    public function sendRequest(): string
    {
        return $this->adaptee->specialRequestImplementation();
    }
}
