<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeRefundProcessor;
use PHPUnit\Framework\TestCase;

class StripeRefundProcessorTest extends TestCase
{
    public function testProcessRefundSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Processing refund via Stripe, 20');
        $paymentSpy = $this->createMock(Payment::class);
        $paymentSpy->expects($this->once())->method('getAmount')->willReturn(20);

        $sut = new StripeRefundProcessor($loggerSpy);
        $sut->processRefund($paymentSpy);
    }
}
