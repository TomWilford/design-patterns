<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Filter\Interface;

use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

interface Filter
{
    /**
     * @param array<object> $data
     */
    public function setData(array $data): void;

    /**
     * @return array<object>
     */
    public function filterData(): array;
}
