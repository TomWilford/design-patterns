<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Application\Action;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\PayPal\PayPalAuthenticationCallback;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Stripe\StripeAuthenticationCallback;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Factory\Registry\PaymentFactoryRegistry;

final readonly class AuthenticationCallbackAction
{
    public function __construct(private PaymentFactoryRegistry $paymentFactoryRegistry)
    {
    }

    public function __invoke(array $request = [], array $arguments = []): string
    {
        $gateway = Gateway::resolveOr404($arguments['payment_gateway']);

        $paymentFactory = $this->paymentFactoryRegistry->getFactory($gateway);
        $callbackHandler = $paymentFactory->getAuthenticationCallback();

        switch (true) {
            case $callbackHandler instanceof StripeAuthenticationCallback:
                $callbackHandler->setToken($arguments['token']);
                break;
            case $callbackHandler instanceof PayPalAuthenticationCallback:
                $callbackHandler->setMfaCode($arguments['secret']);
                break;
        }
        $callbackHandler->processCallback();

        // would be `$response->withRedirect('/checkout/confirm')`
        return '/checkout/confirm';
    }
}
