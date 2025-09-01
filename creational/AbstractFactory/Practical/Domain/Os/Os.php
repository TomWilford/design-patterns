<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Domain\Os;

enum Os: string
{
    case WINDOWS = 'windows';
    case MAC = 'mac';
}
