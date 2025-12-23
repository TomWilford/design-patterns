<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Interface;

interface EmailContactInterface
{
    public function getEmailAddress(): string;

    public function getContactName(): string;
}
