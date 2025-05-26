<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Application\Action;

use Creational\AbstractFactory\Practical\Application\Exception\NotFoundException;
use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Application\Action\CheckoutProcessAction;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\PayPalPaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;
use PHPUnit\Framework\TestCase;

class CheckoutProcessActionTest extends TestCase
{
    public function testNotFoundExceptionSuccessfullyThrownForInvalidGateway()
    {
        $register = $this->createMock(PaymentFactoryRegistry::class);

        $sut = new CheckoutProcessAction($register);

        $this->expectException(NotFoundException::class);
        $sut([
            'payment_gateway' => 'invalid'
        ]);
    }

    public function testRedirectSuccessfullyCalledForValidGateway()
    {
        $redirect = $this->createMock(PayPalAuthenticationRedirect::class);
        $redirect->expects($this->once())->method('redirect')->willReturn('PayPal Success');
        $factory = $this->createMock(PayPalPaymentFactory::class);
        $factory->expects($this->once())->method('getAuthenticationRedirect')
            ->willReturn($redirect);
        $register = $this->createMock(PaymentFactoryRegistry::class);
        $register->expects($this->once())->method('getFactory')
            ->with(Gateway::PAYPAL)
            ->willReturn($factory);

        $sut = new CheckoutProcessAction($register);

        $response = $sut([
            'payment_gateway' => 'paypal'
        ]);

        $this->assertSame('PayPal Success', $response);
    }
}
