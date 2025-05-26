<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Domain\Os;

enum Os: string
{
    case WINDOWS = 'windows';
    case MAC = 'mac';
}
