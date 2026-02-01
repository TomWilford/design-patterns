<?php

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface;

interface AuthenticationCallback
{
    public function processCallback(): void;
}
