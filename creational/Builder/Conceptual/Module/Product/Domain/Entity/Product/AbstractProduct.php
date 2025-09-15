<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity\Product;

use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Product;

abstract class AbstractProduct implements Product
{
    protected array $components = [];

    public function addComponent(Component $component): void
    {
        $this->components[$component->getType()] = $component;
    }

    public function getSize(): ?Component
    {
        return $this->components['size'] ?? null;
    }

    public function getSpecification(): string
    {
        $output = (new \ReflectionClass($this))->getShortName() . " Details:\n";
        foreach ($this->components as $component) {
            $type = ucwords(str_replace('_', ' ', $component->getType()));
            $output .= sprintf("- %s: %s\n", $type, $component->getValue());
        }
        return $output;
    }
}
