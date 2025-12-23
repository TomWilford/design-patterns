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

class PlainTextEmailBuilder extends BaseEmailBuilder
{
    public function setBody(EmailBodyInterface $body): void
    {
        $this->email->setBody($body);
    }
}
