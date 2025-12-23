<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Entity\Attribute;

use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailAttachmentInterface;

readonly class EmailAttachment implements EmailAttachmentInterface
{
    public function __construct(private string $filename, private string $content, private bool $isInline = false)
    {
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getFileType(): string
    {
        return pathinfo($this->filename, PATHINFO_EXTENSION);
    }

    public function isInline(): bool
    {
        return $this->isInline;
    }
}
