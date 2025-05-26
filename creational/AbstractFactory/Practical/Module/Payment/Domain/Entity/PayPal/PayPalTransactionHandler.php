<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseTransactionHandler;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

class PayPalTransactionHandler extends BaseTransactionHandler
{
    public function handlePayment(Payment $payment): void
    {
        $this->logger->log('Processing payment via PayPal, ' . $payment->getAmount());
    }
}
