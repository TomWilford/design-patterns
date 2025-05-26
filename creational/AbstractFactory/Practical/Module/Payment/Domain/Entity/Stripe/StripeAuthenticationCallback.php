<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseAuthenticationCallback;

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
