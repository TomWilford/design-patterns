<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationCallback;

abstract class BaseAuthenticationCallback implements AuthenticationCallback
{
    public function __construct(protected Logger $logger)
    {
    }

    abstract public function processCallback(): void;
}
