<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Notification\Application;

use Creational\Factory\Practical\Module\Notification\Domain\Creator\Abstract\NotificationFactory;

class NotifyAction
{
    public function __invoke(NotificationFactory $creator, string $message): void
    {
        $creator->setNotificationMessage($message);
        $creator->dispatchNotification();
    }
}
