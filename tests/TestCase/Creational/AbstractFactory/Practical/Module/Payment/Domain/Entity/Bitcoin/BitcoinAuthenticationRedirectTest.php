<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationRedirect;
use PHPUnit\Framework\TestCase;

class BitcoinAuthenticationRedirectTest extends TestCase
{
    public function testRedirectSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Redirecting to Bitcoin wallet');

        $sut = new BitcoinAuthenticationRedirect($loggerSpy);
        $sut->redirect();
    }
}
