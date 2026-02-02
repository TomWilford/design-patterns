<?php

declare(strict_types=1);

namespace Structural\Adapter\Conceptual\Application;

use Structural\Adapter\Conceptual\Infrastructure\Request\Interface\Target;

class SendRequestAction
{
    public function __construct(private Target $target)
    {
    }

    public function __invoke(): string
    {
        return $this->target->sendRequest();
    }
}
