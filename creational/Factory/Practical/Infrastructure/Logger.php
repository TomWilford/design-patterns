<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Infrastructure;

class Logger
{
    public function log(string $message): void
    {
        echo $message . PHP_EOL;
    }
}
