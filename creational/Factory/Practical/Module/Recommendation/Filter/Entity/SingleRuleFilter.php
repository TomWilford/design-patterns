<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Filter\Entity;

use Creational\Factory\Practical\Module\Recommendation\Filter\Interface\Filter;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class SingleRuleFilter implements Filter
{
    /**
     * @var array<object>
     */
    private array $data;

    public function __construct(private readonly Rule $rule)
    {
    }

    /**
     * @param array<object> $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function filterData(): array
    {
        return array_filter($this->data, fn($item) => $this->rule->compare($item));
    }
}
