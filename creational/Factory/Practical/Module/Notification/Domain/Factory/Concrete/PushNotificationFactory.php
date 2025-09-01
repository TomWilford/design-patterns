<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Creator\Concrete;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Creator\Abstract\NotificationFactory;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Entity\PushNotifier;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Interface\Notifier;

class PushNotificationFactory extends NotificationFactory
{
    public function getNotifier(): Notifier
    {
        return new PushNotifier($this->logger);
    }
}
