<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalTransactionHandler;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\PayPalPaymentFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PayPalPaymentFactory::class)]
class PayPalPaymentFactoryTest extends TestCase
{
    public function testGetAuthenticationRedirectReturnsPayPalInstance()
    {
        $logger = $this->createStub(Logger::class);
        $sut = new PayPalPaymentFactory($logger);

        $this->assertInstanceOf(PayPalAuthenticationRedirect::class, $sut->getAuthenticationRedirect());
    }

    public function testGetAuthenticationCallbackReturnsPayPalInstance()
    {
        $logger = $this->createStub(Logger::class);
        $sut = new PayPalPaymentFactory($logger);

        $this->assertInstanceOf(PayPalAuthenticationCallback::class, $sut->getAuthenticationCallback());
    }

    public function testGetTransactionHandlerRedirectReturnsPayPalInstance()
    {
        $logger = $this->createStub(Logger::class);
        $sut = new PayPalPaymentFactory($logger);

        $this->assertInstanceOf(PayPalTransactionHandler::class, $sut->getTransactionHandler());
    }

    public function testGetRefundProcessorReturnsPayPalInstance()
    {
        $logger = $this->createStub(Logger::class);
        $sut = new PayPalPaymentFactory($logger);

        $this->assertInstanceOf(PayPalRefundProcessor::class, $sut->getRefundProcessor());
    }
}
