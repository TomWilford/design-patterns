<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Factory\Abstract;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Recommendation\Filter\Interface\Filter;

abstract class FilterFactory
{
    abstract public function getFilterStrategy(): Filter;

    /**
     * @param array<object> $data
     * @return array<object>
     */
    public function filterData(array $data): array
    {
        $filter = $this->getFilterStrategy();
        $filter->setData($data);
        return $filter->filterData();
    }
}
