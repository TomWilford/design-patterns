<?php

declare(strict_types=1);

namespace Fixtures;

readonly class TestEntity
{
    public function __construct(
        private int $id,
        private string $name,
        private int $value
    ) {
        //
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
