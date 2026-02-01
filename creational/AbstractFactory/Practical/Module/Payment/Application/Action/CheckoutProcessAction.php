<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Application\Action;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;

final readonly class CheckoutProcessAction
{
    public function __construct(private PaymentFactoryRegistry $paymentFactoryRegistry)
    {
    }

    /**
     * @param array{
     *     "payment_gateway"?: string
     * } $request
     */
    public function __invoke(array $request = []): string
    {
        $gateway = Gateway::resolveOr404($request['payment_gateway']);

        // save payment information to the database

        $paymentFactory = $this->paymentFactoryRegistry->getFactory($gateway);

        // would be `$response->withRedirect($paymentFactory->getAuthenticationRedirect()->redirect())`
        return $paymentFactory->getAuthenticationRedirect()->redirect();
    }
}
