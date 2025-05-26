<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinTransactionHandler;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Base\BasePaymentFactory;

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
