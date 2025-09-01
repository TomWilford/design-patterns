<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseRefundProcessor;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

class BitcoinRefundProcessor extends BaseRefundProcessor
{
    public function processRefund(Payment $payment): void
    {
        $this->logger->log('Processing refund via Bitcoin, ' . $payment->getAmount());
    }
}
