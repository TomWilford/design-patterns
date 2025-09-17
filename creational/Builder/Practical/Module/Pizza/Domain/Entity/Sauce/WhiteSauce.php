<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Sauce;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Sauce;

class WhiteSauce implements Sauce
{

    public function getName(): string
    {
        return 'White Sauce';
    }

    public function getVolumePerInch(): int
    {
        return 25;
    }
}
