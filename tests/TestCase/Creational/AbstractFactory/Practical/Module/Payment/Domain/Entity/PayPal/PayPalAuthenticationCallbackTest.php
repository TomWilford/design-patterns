<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationCallback;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PayPalAuthenticationCallback::class)]
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
