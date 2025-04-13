<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete;

use Creational\Factory\Practical\Module\Recommendation\Filter\Factory\Abstract\FilterFactory;
use Creational\Factory\Practical\Module\Recommendation\Filter\Entity\MultipleRuleFilter;
use Creational\Factory\Practical\Module\Recommendation\Filter\Interface\Filter;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class MultipleRuleFilterFactory extends FilterFactory
{
    /**
     * @param array<Rule> $rules
     */
    public function __construct(protected readonly array $rules)
    {
    }

    public function getFilterStrategy(): Filter
    {
        return new MultipleRuleFilter($this->rules);
    }
}
