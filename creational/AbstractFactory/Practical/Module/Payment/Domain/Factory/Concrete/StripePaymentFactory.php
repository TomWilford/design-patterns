<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationCallback;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationRedirect;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeRefundProcessor;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeTransactionHandler;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Base\BasePaymentFactory;

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
