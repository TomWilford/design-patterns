<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface;

interface AuthenticationCallback
{
    public function processCallback(): void;
}
