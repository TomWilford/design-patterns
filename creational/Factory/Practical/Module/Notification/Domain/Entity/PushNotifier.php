<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Entity;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Interface\Notifier;

class PushNotifier implements Notifier
{
    private string $message;

    public function __construct(private readonly Logger $logger)
    {
        //
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @inheritDoc
     */
    public function send(): void
    {
        $this->logger->log('Push notification sent with message: ' . $this->message);
    }
}
