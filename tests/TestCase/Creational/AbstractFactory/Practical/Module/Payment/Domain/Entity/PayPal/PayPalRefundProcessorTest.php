<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalRefundProcessor;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PayPalRefundProcessor::class)]
class PayPalRefundProcessorTest extends TestCase
{
    public function testProcessRefundSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Processing refund via PayPal, 20');
        $paymentSpy = $this->createMock(Payment::class);
        $paymentSpy->expects($this->once())->method('getAmount')->willReturn(20);

        $sut = new PayPalRefundProcessor($loggerSpy);
        $sut->processRefund($paymentSpy);
    }
}
