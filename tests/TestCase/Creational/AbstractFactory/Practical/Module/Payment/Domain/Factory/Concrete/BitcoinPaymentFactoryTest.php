<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationCallback;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinAuthenticationRedirect;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinRefundProcessor;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin\BitcoinTransactionHandler;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\BitcoinPaymentFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BitcoinPaymentFactory::class)]
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
