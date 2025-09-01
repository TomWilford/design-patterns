<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseAuthenticationCallback;

class StripeAuthenticationCallback extends BaseAuthenticationCallback
{
    private string $token;

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function processCallback(): void
    {
        $this->logger->log('Processing Stripe callback');
    }
}
