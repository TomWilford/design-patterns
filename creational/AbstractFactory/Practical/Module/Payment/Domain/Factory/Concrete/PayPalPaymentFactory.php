<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationCallback;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationRedirect;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalRefundProcessor;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalTransactionHandler;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Base\BasePaymentFactory;

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
