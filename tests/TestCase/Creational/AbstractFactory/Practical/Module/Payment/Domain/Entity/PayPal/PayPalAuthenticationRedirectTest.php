<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationRedirect;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PayPalAuthenticationRedirect::class)]
class PayPalAuthenticationRedirectTest extends TestCase
{
    public function testRedirectSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Redirecting to PayPal');

        $sut = new PayPalAuthenticationRedirect($loggerSpy);
        $sut->redirect();
    }
}
