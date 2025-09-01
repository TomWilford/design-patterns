<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationCallback;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationRedirect;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalRefundProcessor;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalTransactionHandler;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\PayPalPaymentFactory;
use PHPUnit\Framework\TestCase;

class PayPalPaymentFactoryTest extends TestCase
{
    public function testGetAuthenticationRedirectReturnsPayPalInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new PayPalPaymentFactory($logger);

        $this->assertInstanceOf(PayPalAuthenticationRedirect::class, $sut->getAuthenticationRedirect());
    }

    public function testGetAuthenticationCallbackReturnsPayPalInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new PayPalPaymentFactory($logger);

        $this->assertInstanceOf(PayPalAuthenticationCallback::class, $sut->getAuthenticationCallback());
    }

    public function testGetTransactionHandlerRedirectReturnsPayPalInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new PayPalPaymentFactory($logger);

        $this->assertInstanceOf(PayPalTransactionHandler::class, $sut->getTransactionHandler());
    }

    public function testGetRefundProcessorReturnsPayPalInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new PayPalPaymentFactory($logger);

        $this->assertInstanceOf(PayPalRefundProcessor::class, $sut->getRefundProcessor());
    }
}
