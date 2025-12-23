<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Application\Builder\Interface;

use Creational\Builder\Practical\Module\Email\Domain\Entity\Email\Email;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailAttachmentsInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBCCInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBodyInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailCCInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailRecipientInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSenderInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSubjectInterface;

interface EmailBuilder
{
    public function newEmail(): void;

    public function getEmail(): Email;

    public function setSubject(EmailSubjectInterface $subject): void;

    public function setBody(EmailBodyInterface $body): void;

    public function setAttachments(?EmailAttachmentsInterface $attachments = null): void;

    public function setSender(EmailSenderInterface $sender): void;

    public function setRecipient(EmailRecipientInterface $recipient): void;

    public function setCC(EmailCCInterface $CC): void;

    public function setBCC(EmailBCCInterface $BCC): void;
}
