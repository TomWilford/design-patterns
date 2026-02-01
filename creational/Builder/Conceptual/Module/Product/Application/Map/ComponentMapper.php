<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Map;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Enum\ComponentType;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Component;

class ComponentMapper
{
    /**
     * @param array<string, string> $array
     * @return array<Component>
     */
    public function stringsToObjects(array $array): array
    {
        $result = [];
        foreach ($array as $type => $value) {
            $result[] = ComponentType::from($type)->createWithValue($value);
        }
        return $result;
    }
}
