<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Entity;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class LessThanRule implements Rule
{
    private string $getter;
    private mixed $maximumValue;

    public function setEntityGetterToCompare(string $getter): void
    {
        $this->getter = $getter;
    }

    public function setMaximumValue(mixed $value): void
    {
        $this->maximumValue = $value;
    }


    public function compare(object $entity): bool
    {
        $getter = $this->getter;
        if (method_exists($entity, $getter)) {
            return $entity->$getter() <= $this->maximumValue;
        }
        return false;
    }
}
