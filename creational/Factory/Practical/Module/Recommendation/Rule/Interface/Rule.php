<?php

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Interface;

interface Rule
{
    public function setEntityGetterToCompare(string $getter): void;

    public function compare(object $entity): bool;
}