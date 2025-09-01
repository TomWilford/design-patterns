<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseTransactionHandler;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

class BitcoinTransactionHandler extends BaseTransactionHandler
{
    public function handlePayment(Payment $payment): void
    {
        $this->logger->log('Processing payment via Bitcoin, ' . $payment->getAmount());
    }
}
