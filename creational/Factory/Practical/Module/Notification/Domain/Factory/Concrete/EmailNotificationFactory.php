<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Notification\Domain\Factory\Concrete;

use Creational\Factory\Practical\Module\Notification\Domain\Factory\Abstract\NotificationFactory;
use Creational\Factory\Practical\Module\Notification\Domain\Entity\EmailNotifier;
use Creational\Factory\Practical\Module\Notification\Domain\Interface\Notifier;

class EmailNotificationFactory extends NotificationFactory
{
    public function getNotifier(): Notifier
    {
        return new EmailNotifier($this->logger);
    }
}
