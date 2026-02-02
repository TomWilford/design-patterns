<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;

interface TransactionHandler
{
    public function handlePayment(Payment $payment): void;
}
