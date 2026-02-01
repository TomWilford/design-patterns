<?php

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document;

readonly class Metadata
{
    public function __construct(private MetadataType $type, private string $value)
    {
    }

    public function getType(): MetadataType
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
