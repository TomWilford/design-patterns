<?php

declare(strict_types=1);

namespace Creational\Singleton\Practical\Infrastructure\Log;

use DateTimeImmutable;

class Logger
{
    private static ?Logger $instance = null;
    private $fileHandle;

    private function __construct()
    {
        $this->fileHandle = fopen('php://stdout', 'a');
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
        $date = (new DateTimeImmutable())->format('U');
        fwrite($this->fileHandle, $date . ' ' . $message . "\n");
    }

    public function __destruct() {
        if (is_resource($this->fileHandle)) {
            fclose($this->fileHandle);
        }
    }
}
