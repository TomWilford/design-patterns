<?php

declare(strict_types=1);

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document;

readonly class Signatory
{
    public function __construct(
        private int $id,
        private string $name,
        private string $content
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
