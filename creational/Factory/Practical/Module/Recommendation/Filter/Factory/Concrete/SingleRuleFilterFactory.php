<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Factory\Abstract\FilterFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Entity\SingleRuleFilter;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Interface\Filter;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

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
