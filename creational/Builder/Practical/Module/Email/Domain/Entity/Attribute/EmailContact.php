<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Entity\Attribute;

use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailContactInterface;

readonly class EmailContact implements EmailContactInterface
{
    public function __construct(private string $emailAddress, private ?string $name = null)
    {
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function getContactName(): string
    {
        return $this->name;
    }
}
