<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Base;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Interface\PaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\RefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\TransactionHandler;

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
