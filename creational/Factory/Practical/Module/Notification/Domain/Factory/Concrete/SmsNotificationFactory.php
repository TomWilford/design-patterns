<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Notification\Domain\Creator\Concrete;

use Creational\Factory\Practical\Module\Notification\Domain\Creator\Abstract\NotificationFactory;
use Creational\Factory\Practical\Module\Notification\Domain\Entity\SmsNotifier;
use Creational\Factory\Practical\Module\Notification\Domain\Interface\Notifier;

class SmsNotificationFactory extends NotificationFactory
{
    public function getNotifier(): Notifier
    {
        return new SmsNotifier($this->logger);
    }
}
