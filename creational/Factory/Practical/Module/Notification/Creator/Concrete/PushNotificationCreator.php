<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Notification\Creator\Concrete;

use Creational\Factory\Practical\Module\Notification\Creator\Abstract\Creator;
use Creational\Factory\Practical\Module\Notification\Entity\PushNotifier;
use Creational\Factory\Practical\Module\Notification\Interface\Notifier;

class PushNotificationCreator extends Creator
{
    public function getNotifier(): Notifier
    {
        return new PushNotifier($this->logger);
    }
}
