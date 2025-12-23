<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Application\Builder\Concrete;

use Creational\Builder\Practical\Module\Email\Application\Builder\Interface\EmailBuilder;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Email\Email;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailAttachmentsInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBCCInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBodyInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailCCInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailRecipientInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSenderInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSubjectInterface;

abstract class BaseEmailBuilder implements EmailBuilder
{
    protected Email $email;

    public function newEmail(): void
    {
        $this->email = new Email();
    }

    public function getEmail(): Email
    {
        $result = $this->email;
        $this->newEmail();
        return $result;
    }

    public function setSubject(EmailSubjectInterface $subject): void
    {
        $this->email->setSubject($subject);
    }

    abstract public function setBody(EmailBodyInterface $body): void;

    public function setAttachments(?EmailAttachmentsInterface $attachments = null): void
    {
        $this->email->setAttachments($attachments);
    }

    public function setSender(EmailSenderInterface $sender): void
    {
        $this->email->setSender($sender);
    }

    public function setRecipient(EmailRecipientInterface $recipient): void
    {
        $this->setRecipient($recipient);
    }

    public function setCC(EmailCCInterface $CC): void
    {
        $this->email->setCC($CC);
    }

    public function setBCC(EmailBCCInterface $BCC): void
    {
        $this->email->setBCC($BCC);
    }
}
