<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Entity\Email;

use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailAttachmentsInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBCCInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBodyInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailCCInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailRecipientInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSenderInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSubjectInterface;

class Email
{
    private EmailSubjectInterface $subject;
    private EmailBodyInterface $body;
    private ?EmailAttachmentsInterface $attachments = null;
    private EmailSenderInterface $sender;
    private EmailRecipientInterface $recipient;
    private ?EmailCCInterface $cc = null;
    private ?EmailBCCInterface $bcc = null;

    public function getSubject(): EmailSubjectInterface
    {
        return $this->subject;
    }

    public function setSubject(EmailSubjectInterface $subject): void
    {
        $this->subject = $subject;
    }

    public function getBody(): EmailBodyInterface
    {
        return $this->body;
    }

    public function setBody(EmailBodyInterface $body): void
    {
        $this->body = $body;
    }

    public function getAttachments(): ?EmailAttachmentsInterface
    {
        return $this->attachments;
    }

    public function setAttachments(?EmailAttachmentsInterface $attachments): void
    {
        $this->attachments = $attachments;
    }

    public function getSender(): EmailSenderInterface
    {
        return $this->sender;
    }

    public function setSender(EmailSenderInterface $sender): void
    {
        $this->sender = $sender;
    }

    public function getRecipient(): EmailRecipientInterface
    {
        return $this->recipient;
    }

    public function setRecipient(EmailRecipientInterface $recipient): void
    {
        $this->recipient = $recipient;
    }

    public function getCc(): ?EmailCCInterface
    {
        return $this->cc;
    }

    public function setCc(?EmailCCInterface $cc): void
    {
        $this->cc = $cc;
    }

    public function getBcc(): ?EmailBCCInterface
    {
        return $this->bcc;
    }

    public function setBcc(?EmailBCCInterface $bcc): void
    {
        $this->bcc = $bcc;
    }
}
