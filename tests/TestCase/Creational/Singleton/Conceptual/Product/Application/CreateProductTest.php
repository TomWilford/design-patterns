<?php

declare(strict_types=1);

namespace TestCase\Creational\Singleton\Conceptual\Product\Application;

use Creational\Singleton\Practical\Application\FeatureFlag\FeatureFlagKey;
use Creational\Singleton\Practical\Application\FeatureFlag\FeatureFlagManager;
use Creational\Singleton\Practical\Infrastructure\Log\Logger;
use Creational\Singleton\Practical\Product\Application\CreateProductAction;
use PHPUnit\Framework\TestCase;

class CreateProductTest extends TestCase
{
    public function testLoggingCalledWhenFeatureFlagDisabled(): void
    {
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->never())->method('info');
        $sut = new CreateProductAction($loggerSpy);
        $sut();
    }

    public function testLoggingCalledWhenFeatureFlagEnabled(): void
    {
        FeatureFlagManager::enableFeature(FeatureFlagKey::LOGGING);
        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($this->once())->method('info')->with('Creating product');
        $sut = new CreateProductAction($loggerSpy);
        $sut();
    }
}
