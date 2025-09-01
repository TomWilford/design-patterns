<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Application\Action;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Application\Exception\NotFoundException;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Application\Action\RefundConfirmProcessAction;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeRefundProcessor;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\StripePaymentFactory;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;
use PHPUnit\Framework\TestCase;

class RefundConfirmProcessActionTest extends TestCase
{
    public function testNotFoundExceptionSuccessfullyThrownForInvalidGateway()
    {
        $register = $this->createMock(PaymentFactoryRegistry::class);

        $sut = new RefundConfirmProcessAction($register);

        $this->expectException(NotFoundException::class);
        $sut([
            'payment_gateway' => 'invalid'
        ]);
    }

    public function testProcessRefundSuccessfullyCalled()
    {
        $processor = $this->createMock(StripeRefundProcessor::class);
        $processor->expects($this->once())->method('processRefund')
            ->with(new Payment(200, 21, 'GBP'));;
        $factory = $this->createMock(StripePaymentFactory::class);
        $factory->expects($this->once())->method('getRefundProcessor')
            ->willReturn($processor);
        $register = $this->createMock(PaymentFactoryRegistry::class);
        $register->expects($this->once())->method('getFactory')
            ->with(Gateway::STRIPE)
            ->willReturn($factory);


        $sut = new RefundConfirmProcessAction($register);
        $sut([
            'payment_gateway' => 'stripe',
            'payment' => [
                'amount' => 200,
                'vat_amount' => 21,
                'currency' => 'GBP'
            ]
        ]);
    }
}
