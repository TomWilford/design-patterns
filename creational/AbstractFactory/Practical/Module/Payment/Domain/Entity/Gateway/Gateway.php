<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Application\Utility\Enum\ResolvePureEnum;

enum Gateway
{
    use ResolvePureEnum;

    case PAYPAL;
    case STRIPE;
    case BITCOIN;
}
