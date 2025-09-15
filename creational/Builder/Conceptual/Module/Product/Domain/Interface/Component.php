<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Interface;

interface Component
{
    public function getType(): string;

    public function getValue(): string;
}
