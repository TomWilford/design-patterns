<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationCallback;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BitcoinAuthenticationCallback::class)]
class BitcoinAuthenticationCallbackTest extends TestCase
{
    public function testHandleCallbackSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Processing Bitcoin callback');

        $sut = new BitcoinAuthenticationCallback($loggerSpy);
        $sut->processCallback();
    }
}
