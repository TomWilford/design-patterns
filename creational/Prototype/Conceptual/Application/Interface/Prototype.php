<?php

namespace Creational\Prototype\Conceptual\Application\Interface;

interface Prototype
{
    public function clone(): self;
}
