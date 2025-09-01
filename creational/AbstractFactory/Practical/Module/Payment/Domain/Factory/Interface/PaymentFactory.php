<?php

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Interface;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationCallback;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationRedirect;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\RefundProcessor;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface\TransactionHandler;

interface PaymentFactory
{
    public function getAuthenticationRedirect(): AuthenticationRedirect;
    public function getAuthenticationCallback(): AuthenticationCallback;
    public function getTransactionHandler(): TransactionHandler;
    public function getRefundProcessor(): RefundProcessor;
}
