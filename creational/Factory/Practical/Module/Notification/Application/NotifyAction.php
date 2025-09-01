<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Application;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Creator\Abstract\NotificationFactory;

class NotifyAction
{
    public function __invoke(NotificationFactory $creator, string $message): void
    {
        $creator->setNotificationMessage($message);
        $creator->dispatchNotification();
    }
}
