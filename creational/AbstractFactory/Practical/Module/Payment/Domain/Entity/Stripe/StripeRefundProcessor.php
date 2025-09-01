<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

class StripeRefundProcessor extends BaseRefundProcessor
{
    public function processRefund(Payment $payment): void
    {
        $this->logger->log('Processing refund via Stripe, ' . $payment->getAmount());
    }
}
