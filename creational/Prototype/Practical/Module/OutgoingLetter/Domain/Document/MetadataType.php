<?php

declare(strict_types=1);

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document;

enum MetadataType
{
    case DOCUMENT_VERSION;
    case DOCUMENT_TYPE;
    case PRACTICE_AREA;

    public function toString(): string
    {
        return match ($this) {
            self::DOCUMENT_VERSION => 'Version:',
            self::DOCUMENT_TYPE => 'Type:',
            self::PRACTICE_AREA => 'Area:',
        };
    }
}
