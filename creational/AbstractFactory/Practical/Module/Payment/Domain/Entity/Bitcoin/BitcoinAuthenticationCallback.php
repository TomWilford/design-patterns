<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Bitcoin;

use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Base\BaseAuthenticationCallback;

class BitcoinAuthenticationCallback extends BaseAuthenticationCallback
{
    public function processCallback(): void
    {
        $this->logger->log('Processing Bitcoin callback');
    }
}
