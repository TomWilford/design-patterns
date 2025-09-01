<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseAuthenticationRedirect;

class BitcoinAuthenticationRedirect extends BaseAuthenticationRedirect
{
    public function redirect(): string
    {
        $this->logger->log('Redirecting to Bitcoin wallet');
        return 'https://bitcoin.com/oauth/login';
    }
}
