<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Application\Action;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Application\Exception\NotFoundException;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Application\Action\CheckoutConfirmProcessAction;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalTransactionHandler;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\PayPalPaymentFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;
use PHPUnit\Framework\TestCase;

class CheckoutConfirmProcessActionTest extends TestCase
{
    public function testNotFoundExceptionSuccessfullyThrownForInvalidGateway()
    {
        $register = $this->createMock(PaymentFactoryRegistry::class);

        $sut = new CheckoutConfirmProcessAction($register);

        $this->expectException(NotFoundException::class);
        $sut([
            'payment_gateway' => 'invalid'
        ]);
    }

    public function testHandlePaymentSuccessfullyCalledWithTokenForStripeGateway()
    {
        $handler = $this->createMock(PayPalTransactionHandler::class);
        $handler->expects($this->once())->method('handlePayment')
            ->with(new Payment(200, 21, 'GBP'));
        $factory = $this->createMock(PayPalPaymentFactory::class);
        $factory->expects($this->once())->method('getTransactionHandler')
            ->willReturn($handler);
        $register = $this->createMock(PaymentFactoryRegistry::class);
        $register->expects($this->once())->method('getFactory')
            ->with(Gateway::PAYPAL)
            ->willReturn($factory);

        $sut = new CheckoutConfirmProcessAction($register);
        $sut([
            'payment_gateway' => 'paypal',
            'payment' => [
                'amount' => 200,
                'vat_amount' => 21,
                'currency' => 'GBP'
            ]
        ]);
    }
}
