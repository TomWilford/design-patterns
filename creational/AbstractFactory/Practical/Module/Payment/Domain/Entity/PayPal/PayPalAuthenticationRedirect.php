<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseAuthenticationRedirect;

class PayPalAuthenticationRedirect extends BaseAuthenticationRedirect
{
    public function redirect(): string
    {
        $this->logger->log('Redirecting to PayPal');
        return 'https://www.paypal.com/oauth/signin';
    }
}
