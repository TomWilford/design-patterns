<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeTransactionHandler;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\StripePaymentFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StripePaymentFactory::class)]
class StripePaymentFactoryTest extends TestCase
{
    public function testGetAuthenticationRedirectReturnsStripeInstance()
    {
        $logger = $this->createStub(Logger::class);
        $sut = new StripePaymentFactory($logger);

        $this->assertInstanceOf(StripeAuthenticationRedirect::class, $sut->getAuthenticationRedirect());
    }

    public function testGetAuthenticationCallbackReturnsStripeInstance()
    {
        $logger = $this->createStub(Logger::class);
        $sut = new StripePaymentFactory($logger);

        $this->assertInstanceOf(StripeAuthenticationCallback::class, $sut->getAuthenticationCallback());
    }

    public function testGetTransactionHandlerRedirectReturnsStripeInstance()
    {
        $logger = $this->createStub(Logger::class);
        $sut = new StripePaymentFactory($logger);

        $this->assertInstanceOf(StripeTransactionHandler::class, $sut->getTransactionHandler());
    }

    public function testGetRefundProcessorReturnsStripeInstance()
    {
        $logger = $this->createStub(Logger::class);
        $sut = new StripePaymentFactory($logger);

        $this->assertInstanceOf(StripeRefundProcessor::class, $sut->getRefundProcessor());
    }
}
