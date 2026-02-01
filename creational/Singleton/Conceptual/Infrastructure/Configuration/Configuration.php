<?php

declare(strict_types=1);

namespace Creational\Singleton\Conceptual\Infrastructure\Configuration;

class Configuration
{
    private static ?Configuration $instance = null;
    /**
     * @var array<string, mixed>
     */
    private array $settings = [];

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function set(string $key, mixed $value): void
    {
        $this->settings[$key] = $value;
    }

    public function get(string $key): mixed
    {
        return $this->settings[$key] ?? null;
    }
}
