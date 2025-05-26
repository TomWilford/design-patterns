<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeTransactionHandler;

class StripePaymentFactory extends BasePaymentFactory
{
    public function getAuthenticationRedirect(): StripeAuthenticationRedirect
    {
        return new StripeAuthenticationRedirect($this->logger);
    }

    public function getAuthenticationCallback(): StripeAuthenticationCallback
    {
        return new StripeAuthenticationCallback($this->logger);
    }

    public function getTransactionHandler(): StripeTransactionHandler
    {
        return new StripeTransactionHandler($this->logger);
    }

    public function getRefundProcessor(): StripeRefundProcessor
    {
        return new StripeRefundProcessor($this->logger);
    }
}
