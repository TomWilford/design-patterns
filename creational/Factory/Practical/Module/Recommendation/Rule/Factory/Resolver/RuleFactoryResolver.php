<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Resolver;

use Creational\Factory\Practical\Module\Recommendation\Filter\Exception\InvalidFilterMethodException;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Abstract\RuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\EqualsRuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\GreaterThanRuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\LessThanRuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

readonly class RuleFactoryResolver
{
    /**
     * @param array<array{
     *     "filterProperty": string,
     *     "filterMethod": string,
     *     "filterValue": mixed
     * }> $filterInputs
     * @return array<Rule>
     */
    public function resolveRules(array $filterInputs = []): array
    {
        $rules = [];
        foreach ($filterInputs as $filterInput) {
            $rules[] = $this->buildRuleForFilterInput($filterInput);
        }
        return $rules;
    }

    private function buildRuleForFilterInput(mixed $filterSelection): Rule
    {
        $ruleFactoryClassName = $this->getRuleFactoryClassName($filterSelection['filterMethod']);
        $ruleFactory = $this->instantiateFactory($ruleFactoryClassName, $filterSelection);
        return $ruleFactory->createRule();
    }

    /**
     * @return class-string
     */
    private function getRuleFactoryClassName(string $filterMethod): string
    {
        return match ($filterMethod) {
            'equals' => EqualsRuleFactory::class,
            'greater_than' => GreaterThanRuleFactory::class,
            'less_than' => LessThanRuleFactory::class,
            default => throw new InvalidFilterMethodException("Invalid filter method: $filterMethod"),
        };
    }

    /**
     * @param array{
     *     "filterProperty": string,
     *     "filterValue": mixed
     * } $filterInput
     * @param class-string $ruleFactoryClassName
     */
    private function instantiateFactory(string $ruleFactoryClassName, array $filterInput): RuleFactory
    {
        return new $ruleFactoryClassName($filterInput['filterProperty'], $filterInput['filterValue']);
    }
}
