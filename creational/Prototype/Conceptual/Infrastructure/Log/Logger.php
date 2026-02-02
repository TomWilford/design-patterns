<?php

declare(strict_types=1);

namespace Creational\Prototype\Conceptual\Infrastructure\Log;

class Logger
{
    public function log(string $message): void
    {
        echo $message . PHP_EOL;
    }
}
