<?php

declare(strict_types=1);

namespace Creational\Factory\Conceptual\Domain;

use Creational\Factory\Conceptual\Module\Product\Creator\Abstract\Creator;

readonly class ClientCode
{
    public function __construct(private Creator $creator)
    {
        //
    }

    public function execute(): string
    {
        return $this->creator->someOperation();
    }
}
