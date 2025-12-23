<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Entity\Part;

use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailContactInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSenderInterface;

readonly class EmailSender implements EmailSenderInterface
{
    public function __construct(private EmailContactInterface $contact)
    {
    }

    public function getContact(): EmailContactInterface
    {
        return $this->contact;
    }
}
