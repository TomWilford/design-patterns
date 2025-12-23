<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Entity\Part;

use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailCCInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailContactInterface;

class EmailCC implements EmailCCInterface
{
    /**
     * @param array<EmailContactInterface> $contacts
     */
    public function __construct(private array $contacts = [])
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
