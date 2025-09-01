<?php

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Interface;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\AuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\RefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\TransactionHandler;

interface PaymentFactory
{
    public function getAuthenticationRedirect(): AuthenticationRedirect;
    public function getAuthenticationCallback(): AuthenticationCallback;
    public function getTransactionHandler(): TransactionHandler;
    public function getRefundProcessor(): RefundProcessor;
}
