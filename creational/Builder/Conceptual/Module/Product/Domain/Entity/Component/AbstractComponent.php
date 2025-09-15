<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Component;

use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;

readonly abstract class AbstractComponent implements Component
{
    public function __construct(private string $value)
    {
    }

    abstract public function getType(): string;

    public function getValue(): string
    {
        return $this->value;
    }
}
