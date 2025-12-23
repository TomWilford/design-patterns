<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinRefundProcessor;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BitcoinRefundProcessor::class)]
class BitcoinRefundProcessorTest extends TestCase
{
    public function testProcessRefundSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Processing refund via Bitcoin, 20');
        $paymentSpy = $this->createMock(Payment::class);
        $paymentSpy->expects($this->once())->method('getAmount')->willReturn(20);

        $sut = new BitcoinRefundProcessor($loggerSpy);
        $sut->processRefund($paymentSpy);
    }
}
