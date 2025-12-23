<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Interface;

interface EmailAttachmentInterface
{
    public function getFilename(): string;
    public function getContent(): string;
    public function getFileType(): string;
    public function isInline(): bool;
}
