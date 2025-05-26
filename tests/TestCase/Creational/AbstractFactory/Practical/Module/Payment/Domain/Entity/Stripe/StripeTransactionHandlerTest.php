<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeTransactionHandler;
use PHPUnit\Framework\TestCase;

class StripeTransactionHandlerTest extends TestCase
{
    public function testHandlePaymentSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Processing payment via Stripe, 20');
        $paymentSpy = $this->createMock(Payment::class);
        $paymentSpy->expects($this->once())->method('getAmount')->willReturn(20);

        $sut = new StripeTransactionHandler($loggerSpy);
        $sut->handlePayment($paymentSpy);
    }
}
