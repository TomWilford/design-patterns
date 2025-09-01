<?php

declare(strict_types=1);

namespace TestCase\Creational\Singleton\Practical\Infrastructure\Log;

use Creational\Singleton\Practical\Infrastructure\Log\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    public function testMultipleInstantiationsReturnTheSameInstance()
    {
        $loggerA = Logger::getInstance();
        $loggerB = Logger::getInstance();

        $this->assertSame($loggerA, $loggerB);
    }
}
