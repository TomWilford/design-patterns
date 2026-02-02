<?php

declare(strict_types=1);

namespace Creational\Prototype\Conceptual\Application\Interface;

interface Prototype
{
    public function clone(): self;
}
