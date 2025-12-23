<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Interface;

interface EmailAttachmentsInterface
{
    /**
     * @return array<EmailAttachmentInterface>
     */
    public function getAttachments(): array;
}
