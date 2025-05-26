<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Application\Action;

use Creational\AbstractFactory\Practical\Application\Exception\NotFoundException;
use Creational\AbstractFactory\Practical\Module\Payment\Application\Action\AuthenticationCallbackAction;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\BitcoinPaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\PayPalPaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\StripePaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;
use PHPUnit\Framework\TestCase;

class AuthenticationCallbackActionTest extends TestCase
{
    public function testNotFoundExceptionSuccessfullyThrownForInvalidGateway()
    {
        $register = $this->createMock(PaymentFactoryRegistry::class);

        $sut = new AuthenticationCallbackAction($register);

        $this->expectException(NotFoundException::class);
        $sut(arguments: [
            'payment_gateway' => 'invalid'
        ]);
    }

    public function testProcessCallbackSuccessfullyCalledWithTokenForStripeGateway()
    {
        $callback = $this->createMock(StripeAuthenticationCallback::class);
        $callback->expects($this->once())->method('setToken')
            ->with('abc123');
        $callback->expects($this->once())->method('processCallback');
        $factory = $this->createMock(StripePaymentFactory::class);
        $factory->expects($this->once())->method('getAuthenticationCallback')
            ->willReturn($callback);
        $register = $this->createMock(PaymentFactoryRegistry::class);
        $register->expects($this->once())->method('getFactory')
            ->with(Gateway::STRIPE)
            ->willReturn($factory);

        $sut = new AuthenticationCallbackAction($register);
        $sut(arguments: [
            'payment_gateway' => 'stripe',
            'token' => 'abc123'
        ]);
    }

    public function testProcessCallbackSuccessfullyCalledWithSecretForPayPalGateway()
    {
        $callback = $this->createMock(PayPalAuthenticationCallback::class);
        $callback->expects($this->once())->method('setSecret')
            ->with('abc123');
        $callback->expects($this->once())->method('processCallback');
        $factory = $this->createMock(PayPalPaymentFactory::class);
        $factory->expects($this->once())->method('getAuthenticationCallback')
            ->willReturn($callback);
        $register = $this->createMock(PaymentFactoryRegistry::class);
        $register->expects($this->once())->method('getFactory')
            ->with(Gateway::PAYPAL)
            ->willReturn($factory);

        $sut = new AuthenticationCallbackAction($register);
        $sut(arguments: [
            'payment_gateway' => 'PAYPAL',
            'secret' => 'abc123'
        ]);
    }

    public function testProcessCallbackSuccessfullyCalledForBitcoinGateway()
    {
        $callback = $this->createMock(BitcoinAuthenticationCallback::class);
        $callback->expects($this->once())->method('processCallback');
        $factory = $this->createMock(BitcoinPaymentFactory::class);
        $factory->expects($this->once())->method('getAuthenticationCallback')
            ->willReturn($callback);
        $register = $this->createMock(PaymentFactoryRegistry::class);
        $register->expects($this->once())->method('getFactory')
            ->with(Gateway::BITCOIN)
            ->willReturn($factory);

        $sut = new AuthenticationCallbackAction($register);
        $sut(arguments: [
            'payment_gateway' => 'bItCOin',
            'secret' => 'abc123'
        ]);
    }
}
