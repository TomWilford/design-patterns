<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationRedirect;

abstract class BaseAuthenticationRedirect implements AuthenticationRedirect
{
    public function __construct(protected Logger $logger)
    {
    }

    abstract public function redirect(): string;
}
