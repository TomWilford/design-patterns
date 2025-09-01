<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Filter\Runner;

use Creational\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete\MultipleRuleFilterFactory;
use Creational\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete\SingleRuleFilterFactory;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

readonly class FilterRunner
{
    /**
     * @param array<object> $data
     * @param array<Rule> $rules
     * @return array<object>
     */
    public function runFilters(array $data, array $rules = []): array
    {
        return match (count($rules)) {
            0 => $data,
            1 => (new SingleRuleFilterFactory($rules[array_key_first($rules)]))->filterData($data),
            default => (new MultipleRuleFilterFactory($rules))->filterData($data),
        };
    }
}
