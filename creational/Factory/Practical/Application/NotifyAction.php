<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Application;

use Creational\Factory\Practical\Module\Notification\Creator\Abstract\Creator;

class NotifyAction
{
    public function __invoke(Creator $creator, string $message): void
    {
        $creator->setNotificationMessage($message);
        $creator->dispatchNotification();
    }
}
