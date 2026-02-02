<?php

declare(strict_types=1);

namespace Creational\Prototype\Practical\Application\Interface;

interface Prototype
{
    public function clone(): self;
}
