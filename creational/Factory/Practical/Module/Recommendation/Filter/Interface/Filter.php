<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Filter\Interface;

use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

interface Filter
{
    public function setData(array $data): void;

    public function filterData(): array;
}
