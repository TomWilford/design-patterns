<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Entity\Part;

use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailContactInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailRecipientInterface;

readonly class EmailRecipient implements EmailRecipientInterface
{
    /**
     * @param array<EmailContactInterface> $contacts
     */
    public function __construct(private array $contacts)
    {
    }

    /**
     * @inheritDoc
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }
}
