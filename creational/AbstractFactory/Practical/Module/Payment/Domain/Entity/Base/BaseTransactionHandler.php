<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Interface\TransactionHandler;

abstract class BaseTransactionHandler implements TransactionHandler
{
    public function __construct(protected Logger $logger)
    {
    }

    abstract public function handlePayment(Payment $payment): void;
}
