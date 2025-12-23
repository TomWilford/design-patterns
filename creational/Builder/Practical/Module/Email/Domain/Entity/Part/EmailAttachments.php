<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Entity\Part;

use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailAttachmentInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailAttachmentsInterface;

readonly class EmailAttachments implements EmailAttachmentsInterface
{
    /**
     * @param array<EmailAttachmentInterface> $attachments
     */
    public function __construct(private array $attachments = [])
    {
    }

    /**
     * @inheritDoc
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }
}
