<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Application\Action;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Application\Exception\NotFoundException;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Application\Action\CheckoutProcessAction;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationRedirect;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\PayPalPaymentFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;
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
