<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Application\Action;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;

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
