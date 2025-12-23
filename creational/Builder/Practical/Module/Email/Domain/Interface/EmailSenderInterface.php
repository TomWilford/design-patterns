<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Interface;

interface EmailSenderInterface
{
    public function getContact(): EmailContactInterface;
}
