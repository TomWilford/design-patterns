<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationRedirect;

abstract class BaseAuthenticationRedirect implements AuthenticationRedirect
{
    public function __construct(protected Logger $logger)
    {
    }

    abstract public function redirect(): string;
}
