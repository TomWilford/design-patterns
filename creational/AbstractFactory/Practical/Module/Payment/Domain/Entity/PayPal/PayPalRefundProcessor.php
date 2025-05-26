<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

class PayPalRefundProcessor extends BaseRefundProcessor
{
    public function processRefund(Payment $payment): void
    {
        $this->logger->log('Processing refund via PayPal, ' . $payment->getAmount());
    }
}
