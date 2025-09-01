<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationCallback;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationRedirect;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinRefundProcessor;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinTransactionHandler;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\BitcoinPaymentFactory;
use PHPUnit\Framework\TestCase;

class BitcoinPaymentFactoryTest extends TestCase
{
    public function testGetAuthenticationRedirectReturnsBitcoinInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new BitcoinPaymentFactory($logger);

        $this->assertInstanceOf(BitcoinAuthenticationRedirect::class, $sut->getAuthenticationRedirect());
    }

    public function testGetAuthenticationCallbackReturnsBitcoinInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new BitcoinPaymentFactory($logger);

        $this->assertInstanceOf(BitcoinAuthenticationCallback::class, $sut->getAuthenticationCallback());
    }

    public function testGetTransactionHandlerRedirectReturnsBitcoinInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new BitcoinPaymentFactory($logger);

        $this->assertInstanceOf(BitcoinTransactionHandler::class, $sut->getTransactionHandler());
    }

    public function testGetRefundProcessorReturnsBitcoinInstance()
    {
        $logger = $this->createMock(Logger::class);
        $sut = new BitcoinPaymentFactory($logger);

        $this->assertInstanceOf(BitcoinRefundProcessor::class, $sut->getRefundProcessor());
    }
}
