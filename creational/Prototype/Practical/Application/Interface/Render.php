<?php

declare(strict_types=1);

namespace Creational\Prototype\Practical\Application\Interface;

interface Render
{
    /**
     * @param array<string, mixed> $arguments
     */
    public function output(array $arguments): string;
}
