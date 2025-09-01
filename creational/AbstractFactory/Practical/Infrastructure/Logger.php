<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Infrastructure;

class Logger
{
    public function log(string $message): void
    {
        echo $message . PHP_EOL;
    }
}
