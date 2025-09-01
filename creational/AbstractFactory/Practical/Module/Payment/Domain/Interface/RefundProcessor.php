<?php

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

interface RefundProcessor
{
    public function processRefund(Payment $payment);
}
