<?php

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface;

interface AuthenticationRedirect
{
    public function redirect(): string;
}
