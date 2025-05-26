<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment;

readonly class Payment
{
    public function __construct(private int $amount,  private int $vatAmount, private string $currency)
    {
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getVatAmount(): int
    {
        return $this->vatAmount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
