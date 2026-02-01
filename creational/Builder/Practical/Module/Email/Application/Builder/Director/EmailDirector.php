<?php

namespace Creational\Builder\Practical\Module\Email\Application\Builder\Director;

use Creational\Builder\Practical\Module\Email\Application\Builder\Interface\EmailBuilder;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailAttachmentInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailAttachmentsInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBCCInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBodyInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSenderInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSubjectInterface;

class EmailDirector
{
    private EmailBuilder $emailBuilder;

    public function setEmailBuilder(EmailBuilder $emailBuilder): void
    {
        $this->emailBuilder = $emailBuilder;
    }

    public function buildStandardEmail(
        EmailSubjectInterface $emailSubject,
        EmailBodyInterface $emailBody,
        EmailSenderInterface $emailSender
    ): void {
        $this->emailBuilder->newEmail();
        $this->emailBuilder->setSubject($emailSubject);
        $this->emailBuilder->setBody($emailBody);
        $this->emailBuilder->setSender($emailSender);
    }

    public function buildMarketingEmail(
        EmailSubjectInterface $emailSubject,
        EmailBodyInterface $emailBody,
        EmailSenderInterface $emailSender,
        EmailBCCInterface $bcc,
        ?EmailAttachmentsInterface $emailAttachment = null
    ): void {
        $this->buildStandardEmail(
            $emailSubject,
            $emailBody,
            $emailSender,
        );
        $this->emailBuilder->setBCC($bcc);
        if ($emailAttachment) {
            $this->emailBuilder->setAttachments($emailAttachment);
        }
    }
}
