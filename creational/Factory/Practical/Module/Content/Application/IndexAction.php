<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Content\Application;

use Creational\Factory\Practical\Module\Recommendation\Filter\Creator\Abstract\FilterFactory;
use Creational\Factory\Practical\Module\Recommendation\Filter\Creator\Concrete\MultipleRuleFilterFactory;
use Creational\Factory\Practical\Module\Recommendation\Filter\Creator\Concrete\SingleRuleFilterFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\EqualsRuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\GreaterThanRuleFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Factory\Concrete\LessThanRuleFactory;

class IndexAction
{
    /**
     * @param array<array{
     *     "filterProperty": string,
     *     "filterMethod": string,
     *     "filterValue": mixed
     * }> $filterSelections
     * @param array<object> $data
     */
    public function __invoke(array $filterSelections, array $data): array
    {
        //TODO: Split into RuleFactoryResolver
        $rules = [];
        foreach ($filterSelections as $filterSelection) {
            $ruleFactoryClass = match ($filterSelection['filterMethod']) {
                'equals' => EqualsRuleFactory::class,
                'greater_than' => GreaterThanRuleFactory::class,
                'less_than' => LessThanRuleFactory::class,
            };
            $ruleFactory = new $ruleFactoryClass($filterSelection['filterProperty'], $filterSelection['filterValue']);
            $rules[] = $ruleFactory->createRule();
        }

        //TODO: Split into FilterRunner?
        return match (count($rules)) {
            0 => $data,
            1 => (new SingleRuleFilterFactory($rules[array_key_first($rules)]))->filterData($data),
            default => (new MultipleRuleFilterFactory($rules))->filterData($data),
        };
    }
}
