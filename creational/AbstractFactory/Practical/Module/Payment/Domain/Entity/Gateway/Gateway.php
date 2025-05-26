<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway;

use Creational\AbstractFactory\Practical\Application\Utility\Enum\ResolvePureEnum;

enum Gateway
{
    use ResolvePureEnum;

    case PAYPAL;
    case STRIPE;
    case BITCOIN;
}
