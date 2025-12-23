<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\BitcoinPaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\PayPalPaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\StripePaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PaymentFactoryRegistry::class)]
class PaymentFactoryRegistryTest extends TestCase
{
    public function testGetFactoryForPayPalGateway()
    {
        $logger = $this->createMock(Logger::class);

        $sut = new PaymentFactoryRegistry($logger);
        $this->assertInstanceOf(PayPalPaymentFactory::class, $sut->getFactory(Gateway::PAYPAL));
    }

    public function testGetFactoryForBitcoinGateway()
    {
        $logger = $this->createMock(Logger::class);

        $sut = new PaymentFactoryRegistry($logger);
        $this->assertInstanceOf(BitcoinPaymentFactory::class, $sut->getFactory(Gateway::BITCOIN));
    }

    public function testGetFactoryForStripeGateway()
    {
        $logger = $this->createMock(Logger::class);

        $sut = new PaymentFactoryRegistry($logger);
        $this->assertInstanceOf(StripePaymentFactory::class, $sut->getFactory(Gateway::STRIPE));
    }
}
