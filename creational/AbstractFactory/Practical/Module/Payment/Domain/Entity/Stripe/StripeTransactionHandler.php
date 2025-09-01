<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseTransactionHandler;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

class StripeTransactionHandler extends BaseTransactionHandler
{
    public function handlePayment(Payment $payment): void
    {
        $this->logger->log('Processing payment via Stripe, ' . $payment->getAmount());
    }
}
