<?php

declare(strict_types=1);

namespace Creational\Singleton\Practical\Application\FeatureFlag;

class FeatureFlagManager
{
    /**
     * @var array<FeatureFlag>
     */
    private static array $featureFlags = [];

    private function __construct()
    {
    }

    public static function enableFeature(string $key): void
    {
        self::$featureFlags[$key] = new FeatureFlag($key, true);
    }

    public static function disableFeatureFlag(string $key): void
    {
        self::$featureFlags[$key] = new FeatureFlag($key, false);
    }

    public static function isEnabled(string $key): bool
    {
        if (!isset(self::$featureFlags[$key])) {
            return false;
        }
        return self::$featureFlags[$key]->isEnabled();
    }
}
