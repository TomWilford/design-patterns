<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Application\Action;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;

final readonly class CheckoutConfirmProcessAction
{
    public function __construct(private PaymentFactoryRegistry $paymentFactoryRegistry)
    {
    }

    public function __invoke(array $request = []): string
    {
        $gateway = Gateway::resolveOr404($request['payment_gateway']);

        $payment = new Payment(
            $request['payment']['amount'],
            $request['payment']['vat_amount'],
            $request['payment']['currency'],
        );

        $paymentFactory = $this->paymentFactoryRegistry->getFactory($gateway);
        $paymentFactory->getTransactionHandler()->handlePayment($payment);

        return '/checkout/completed';
    }
}
