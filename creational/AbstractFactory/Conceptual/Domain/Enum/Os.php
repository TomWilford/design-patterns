<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Domain\Enum;

enum Os: string
{
    case WINDOWS = 'windows';
    case MAC = 'mac';
}
