<?php

declare(strict_types=1);

namespace Structural\Adapter\Conceptual\Module\Adaptee\Infrastructure\Request;

class Adaptee
{
    public function specialRequestImplementation(): string
    {
        return 'Performing Adaptee\'s request';
    }
}
