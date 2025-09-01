<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Abstract;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

abstract class RuleFactory
{
    public function __construct(
        protected string $entityPropertyToCompare,
        protected mixed $inputValueToCompare
    ) {
        //
    }

    abstract public function createRule(): Rule;

    protected function createGetterForPropertyToCompare(): string
    {
        return 'get' . ucfirst($this->entityPropertyToCompare);
    }
}
