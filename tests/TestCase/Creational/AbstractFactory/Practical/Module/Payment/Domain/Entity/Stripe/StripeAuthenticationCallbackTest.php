<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationCallback;
use PHPUnit\Framework\TestCase;

class StripeAuthenticationCallbackTest extends TestCase
{
    public function testHandleCallbackSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Processing Stripe callback');

        $sut = new StripeAuthenticationCallback($loggerSpy);
        $sut->processCallback();
    }
}
