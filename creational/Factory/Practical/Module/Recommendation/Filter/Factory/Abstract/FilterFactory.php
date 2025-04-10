<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Filter\Creator\Abstract;

use Creational\Factory\Practical\Module\Recommendation\Filter\Interface\Filter;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

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
