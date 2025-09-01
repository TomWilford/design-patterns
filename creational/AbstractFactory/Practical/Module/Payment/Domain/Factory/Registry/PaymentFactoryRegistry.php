<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry;

use Creational\AbstractFactory\Practical\Infrastructure\Logger;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\BitcoinPaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\PayPalPaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Concrete\StripePaymentFactory;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Interface\PaymentFactory;

class PaymentFactoryRegistry
{
    /**
     * @var array<PaymentFactory>
     */
    private array $factories = [];

    public function __construct(private readonly Logger $logger)
    {
    }

    public function getFactory(Gateway $gateway): PaymentFactory
    {
        if (!isset($this->factories[$gateway->name])) {
            $this->factories[$gateway->name] = match ($gateway) {
                Gateway::PAYPAL => new PayPalPaymentFactory($this->logger),
                Gateway::STRIPE => new StripePaymentFactory($this->logger),
                Gateway::BITCOIN => new BitcoinPaymentFactory($this->logger),
            };
        }
        return $this->factories[$gateway->name];
    }
}
