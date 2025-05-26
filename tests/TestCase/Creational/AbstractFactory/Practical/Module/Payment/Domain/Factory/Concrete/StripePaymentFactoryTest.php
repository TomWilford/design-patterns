<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeTransactionHandler;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\StripePaymentFactory;
use PHPUnit\Framework\TestCase;

class StripePaymentFactoryTest extends TestCase
{
    public function testGetAuthenticationRedirectReturnsStripeInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new StripePaymentFactory($logger);

        $this->assertInstanceOf(StripeAuthenticationRedirect::class, $sut->getAuthenticationRedirect());
    }

    public function testGetAuthenticationCallbackReturnsStripeInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new StripePaymentFactory($logger);

        $this->assertInstanceOf(StripeAuthenticationCallback::class, $sut->getAuthenticationCallback());
    }

    public function testGetTransactionHandlerRedirectReturnsStripeInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new StripePaymentFactory($logger);

        $this->assertInstanceOf(StripeTransactionHandler::class, $sut->getTransactionHandler());
    }

    public function testGetRefundProcessorReturnsStripeInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new StripePaymentFactory($logger);

        $this->assertInstanceOf(StripeRefundProcessor::class, $sut->getRefundProcessor());
    }
}
