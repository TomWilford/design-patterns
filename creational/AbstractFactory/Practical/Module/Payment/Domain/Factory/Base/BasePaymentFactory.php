<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Base;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Interface\PaymentFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationCallback;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationRedirect;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\RefundProcessor;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\TransactionHandler;

abstract class BasePaymentFactory implements PaymentFactory
{
    public function __construct(protected Logger $logger)
    {
    }

    abstract public function getAuthenticationRedirect(): AuthenticationRedirect;
    abstract public function getAuthenticationCallback(): AuthenticationCallback;
    abstract public function getTransactionHandler(): TransactionHandler;
    abstract public function getRefundProcessor(): RefundProcessor;
}
