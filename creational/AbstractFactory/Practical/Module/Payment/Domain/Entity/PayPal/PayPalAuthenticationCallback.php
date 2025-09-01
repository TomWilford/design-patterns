<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseAuthenticationCallback;

class PayPalAuthenticationCallback extends BaseAuthenticationCallback
{
    private string $secret;

    public function setMfaCode(string $secret): void
    {
        $this->secret = $secret;
    }

    public function processCallback(): void
    {
        $this->logger->log('Processing PayPal callback');
    }
}
