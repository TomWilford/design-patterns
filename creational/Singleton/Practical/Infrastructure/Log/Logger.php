<?php

declare(strict_types=1);

namespace Creational\Singleton\Practical\Infrastructure\Log;

use DateTimeImmutable;
use Nyholm\Psr7\Stream;
use Psr\Http\Message\StreamInterface;

class Logger
{
    private static ?Logger $instance = null;
    private ?StreamInterface $fileHandle = null;

    private function __construct()
    {
        $this->fileHandle = new Stream(fopen('php://stdout', 'a'));
    }

    public static function getInstance(): Logger
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function info(string $message): void
    {
        $this->writeToLog('[Info] ' . $message);
    }

    public function warning(string $message): void
    {
        $this->writeToLog('[Warning] ' . $message);
    }

    public function error(string $message): void
    {
        $this->writeToLog('[Error] ' . $message);
    }

    private function writeToLog(string $message): void
    {
        $date = new DateTimeImmutable()->format('U');
        $this->fileHandle->write($date . ' ' . $message . "\n");
    }

    public function __destruct()
    {
        if ($this->fileHandle && $this->fileHandle->isWritable()) {
            $this->fileHandle->close();
        }
    }
}
