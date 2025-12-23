<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationRedirect;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StripeAuthenticationRedirect::class)]
class StripeAuthenticationRedirectTest extends TestCase
{
    public function testRedirectSuccessfullyLogsAction(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('log')->with('Redirecting to Stripe wallet');

        $sut = new StripeAuthenticationRedirect($loggerSpy);
        $sut->redirect();
    }
}
