<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Content\Application;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Runner\FilterRunner;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Factory\Resolver\RuleFactoryResolver;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class IndexAction
{
    public function __construct(
        private RuleFactoryResolver $ruleFactoryResolver,
        private FilterRunner $filterRunner,
    ) {
    }

    /**
     * @param array<array{
     *     "filterProperty": string,
     *     "filterMethod": string,
     *     "filterValue": mixed
     * }> $filterInput
     * @param array<object> $data
     */
    public function __invoke(array $filterInput, array $data): array
    {
        $rules = $this->ruleFactoryResolver->resolveRules($filterInput);
        return $this->filterRunner->runFilters($data, $rules);
    }
}
