<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Abstract;

use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

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
