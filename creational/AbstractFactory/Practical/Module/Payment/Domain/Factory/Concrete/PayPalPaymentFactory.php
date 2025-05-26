<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalTransactionHandler;

class PayPalPaymentFactory extends BasePaymentFactory
{
    public function getAuthenticationRedirect(): PayPalAuthenticationRedirect
    {
        return new PayPalAuthenticationRedirect($this->logger);
    }

    public function getAuthenticationCallback(): PayPalAuthenticationCallback
    {
        return new PayPalAuthenticationCallback($this->logger);
    }

    public function getTransactionHandler(): PayPalTransactionHandler
    {
        return new PayPalTransactionHandler($this->logger);
    }

    public function getRefundProcessor(): PayPalRefundProcessor
    {
        return new PayPalRefundProcessor($this->logger);
    }
}
