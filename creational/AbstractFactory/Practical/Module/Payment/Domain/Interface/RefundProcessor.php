<?php

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

interface RefundProcessor
{
    public function processRefund(Payment $payment);
}
