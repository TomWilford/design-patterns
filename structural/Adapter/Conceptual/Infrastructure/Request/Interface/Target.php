<?php

declare(strict_types=1);

namespace Structural\Adapter\Conceptual\Infrastructure\Request\Interface;

interface Target
{
    public function sendRequest(): string;
}
