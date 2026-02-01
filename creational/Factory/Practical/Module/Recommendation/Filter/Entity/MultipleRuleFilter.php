<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Recommendation\Filter\Entity;

use Creational\Factory\Practical\Module\Recommendation\Filter\Interface\Filter;
use Creational\Factory\Practical\Module\Recommendation\Rule\Interface\Rule;

class MultipleRuleFilter implements Filter
{
    /**
     * @var array<object>
     */
    private array $data;

    /**
     * @param array<Rule> $rules
     */
    public function __construct(private readonly array $rules)
    {
    }

    /**
     * @param array<object> $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return array<object>
     */
    public function filterData(): array
    {
        $result = $this->data;
        foreach ($this->rules as $rule) {
            $result = array_filter($result, fn($item) => $rule->compare($item));
        }
        return $result;
    }
}
