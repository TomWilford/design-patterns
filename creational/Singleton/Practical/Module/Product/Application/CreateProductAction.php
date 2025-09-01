<?php

declare(strict_types=1);

namespace Creational\Singleton\Practical\Module\Product\Application;

use Creational\Singleton\Practical\Application\FeatureFlag\FeatureFlagKey;
use Creational\Singleton\Practical\Application\FeatureFlag\FeatureFlagManager;
use Creational\Singleton\Practical\Infrastructure\Log\Logger;

class CreateProductAction
{
    public function __construct(private readonly Logger $logger)
    {
    }

    public function __invoke(): void
    {
        if (FeatureFlagManager::isEnabled(FeatureFlagKey::LOGGING)) {
            $this->logger->info('Creating product');
        }
    }
}
