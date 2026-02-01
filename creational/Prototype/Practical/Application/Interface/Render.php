<?php

namespace Creational\Prototype\Practical\Application\Interface;

interface Render
{
    /**
     * @param array<string, mixed> $arguments
     */
    public function output(array $arguments): string;
}
