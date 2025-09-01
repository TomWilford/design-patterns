<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseAuthenticationRedirect;

class StripeAuthenticationRedirect extends BaseAuthenticationRedirect
{
    public function redirect(): string
    {
        $this->logger->log('Redirecting to Stripe wallet');
        return 'https://stripe.com/oauth/authorize';
    }
}
