<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Content\Data;

use Creational\Factory\Practical\Module\Content\Enum\Type;

readonly class Content
{
    public function __construct(
        private int $id,
        private string $name,
        private Type $type,
        private int $rating
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

    public function getType(): Type
    {
        return $this->type;
    }

    public function getRating(): int
    {
        return $this->rating;
    }
}
