<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Filter\Creator\Concrete;

use Creational\Factory\Practical\Module\Recommendation\Filter\Creator\Abstract\FilterFactory;
use Creational\Factory\Practical\Module\Recommendation\Filter\Entity\SingleRuleFilter;
use Creational\Factory\Practical\Module\Recommendation\Filter\Interface\Filter;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class SingleRuleFilterFactory extends FilterFactory
{
    public function __construct(protected readonly Rule $rule)
    {
        //
    }

    public function getFilterStrategy(): Filter
    {
        return new SingleRuleFilter($this->rule);
    }
}
