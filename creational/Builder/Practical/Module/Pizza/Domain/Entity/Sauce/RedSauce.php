<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Pizza\Domain\Entity\Sauce;

use Creational\Builder\Practical\Module\Pizza\Domain\Interface\Sauce;

class RedSauce implements Sauce
{

    public function getName(): string
    {
        return 'Standard Red Sauce';
    }

    public function getVolumePerInch(): int
    {
        return 30;
    }
}
