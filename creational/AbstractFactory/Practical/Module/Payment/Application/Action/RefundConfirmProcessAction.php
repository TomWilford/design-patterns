<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Application\Action;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Payment\Payment;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;

final readonly class RefundConfirmProcessAction
{
    public function __construct(private PaymentFactoryRegistry $paymentFactoryRegistry)
    {
    }

    /**
     * @param array{
     *     "payment_gateway"?: string,
     *     "payment"?: array{
     *          "amount": int,
     *          "vat_amount": int,
     *          "currency": string
     *      }
     * } $request
     */
    public function __invoke(array $request = []): string
    {
        $gateway = Gateway::resolveOr404($request['payment_gateway']);

        $payment = new Payment(
            amount: $request['payment']['amount'],
            vatAmount: $request['payment']['vat_amount'],
            currency: $request['payment']['currency'],
        );

        $paymentFactory = $this->paymentFactoryRegistry->getFactory($gateway);
        $paymentFactory->getRefundProcessor()->processRefund($payment);

        return '/refund/completed';
    }
}
