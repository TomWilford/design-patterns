<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalTransactionHandler;
use PHPUnit\Framework\TestCase;

class PayPalTransactionHandlerTest extends TestCase
{
    public function testHandlePaymentSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Processing payment via PayPal, 20');
        $paymentSpy = $this->createMock(Payment::class);
        $paymentSpy->expects($this->once())->method('getAmount')->willReturn(20);

        $sut = new PayPalTransactionHandler($loggerSpy);
        $sut->handlePayment($paymentSpy);
    }
}
