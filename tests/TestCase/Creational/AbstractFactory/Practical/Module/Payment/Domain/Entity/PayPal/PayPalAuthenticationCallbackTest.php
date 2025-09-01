<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationCallback;
use PHPUnit\Framework\TestCase;

class PayPalAuthenticationCallbackTest extends TestCase
{
    public function testHandleCallbackSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Processing PayPal callback');

        $sut = new PayPalAuthenticationCallback($loggerSpy);
        $sut->processCallback();
    }
}
