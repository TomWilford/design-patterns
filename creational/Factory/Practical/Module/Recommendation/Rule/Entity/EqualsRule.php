<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Entity;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class EqualsRule implements Rule
{
    private string $getter;
    private mixed $value;

    public function setEntityGetterToCompare(string $getter): void
    {
        $this->getter = $getter;
    }

    public function setExpectedValue(mixed $value): void
    {
        $this->value = $value;
    }

    public function compare(object $entity): bool
    {
        $getter = $this->getter;
        if (method_exists($entity, $getter)) {
            return $entity->$getter() == $this->value;
        }
        return false;
    }
}
