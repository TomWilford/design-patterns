<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Resolver;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Exception\InvalidFilterMethodException;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Abstract\RuleFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\EqualsRuleFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\GreaterThanRuleFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\LessThanRuleFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

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
    private function getRuleFactoryClassName($filterMethod): string
    {
        return match ($filterMethod) {
            'equals' => EqualsRuleFactory::class,
            'greater_than' => GreaterThanRuleFactory::class,
            'less_than' => LessThanRuleFactory::class,
            default => throw new InvalidFilterMethodException("Invalid filter method: $filterMethod"),
        };
    }

    /**
     * @param class-string $ruleFactoryClassName
     */
    private function instantiateFactory(string $ruleFactoryClassName, array $filterInput): RuleFactory
    {
        return new $ruleFactoryClassName($filterInput['filterProperty'], $filterInput['filterValue']);
    }
}
