<?php

namespace Creational\Prototype\Practical\Application\Interface;

interface Render
{
    public function output(array $arguments): string;
}
