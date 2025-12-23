<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Interface;

interface EmailRecipientInterface
{
    /**
     * @return array<EmailContactInterface>
     */
    public function getContacts(): array;
}
