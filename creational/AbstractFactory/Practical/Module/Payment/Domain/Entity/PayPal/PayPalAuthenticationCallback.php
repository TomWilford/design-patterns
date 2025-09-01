<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseAuthenticationCallback;

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
