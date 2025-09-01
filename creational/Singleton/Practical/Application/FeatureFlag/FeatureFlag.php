<?php

declare(strict_types=1);

namespace Creational\Singleton\Practical\Application\FeatureFlag;

readonly class FeatureFlag
{
    public function __construct(private string $key, private bool $enabled)
    {
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }
}
