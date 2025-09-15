<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Map;

use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Enum\ComponentType;

class ComponentMapper
{
    public function stringsToObjects(array $array): array
    {
        $result = [];
        foreach ($array as $type => $value) {
            $result[] = ComponentType::from($type)->createWithValue($value);
        }
        return $result;
    }
}
