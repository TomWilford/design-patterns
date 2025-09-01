<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationCallback;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationRedirect;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinRefundProcessor;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinTransactionHandler;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Base\BasePaymentFactory;

class BitcoinPaymentFactory extends BasePaymentFactory
{
    public function getAuthenticationRedirect(): BitcoinAuthenticationRedirect
    {
        return new BitcoinAuthenticationRedirect($this->logger);
    }

    public function getAuthenticationCallback(): BitcoinAuthenticationCallback
    {
        return new BitcoinAuthenticationCallback($this->logger);
    }

    public function getTransactionHandler(): BitcoinTransactionHandler
    {
        return new BitcoinTransactionHandler($this->logger);
    }

    public function getRefundProcessor(): BitcoinRefundProcessor
    {
        return new BitcoinRefundProcessor($this->logger);
    }
}
