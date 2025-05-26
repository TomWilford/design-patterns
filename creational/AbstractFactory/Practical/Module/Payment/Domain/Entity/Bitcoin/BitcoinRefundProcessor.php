<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

class BitcoinRefundProcessor extends BaseRefundProcessor
{
    public function processRefund(Payment $payment): void
    {
        $this->logger->log('Processing refund via Bitcoin, ' . $payment->getAmount());
    }
}
