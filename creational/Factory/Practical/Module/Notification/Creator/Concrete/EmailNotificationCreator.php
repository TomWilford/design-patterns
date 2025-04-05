<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Notification\Creator\Concrete;

use Creational\Factory\Practical\Module\Notification\Creator\Abstract\Creator;
use Creational\Factory\Practical\Module\Notification\Entity\EmailNotifier;
use Creational\Factory\Practical\Module\Notification\Interface\Notifier;

class EmailNotificationCreator extends Creator
{
    public function getNotifier(): Notifier
    {
        return new EmailNotifier($this->logger);
    }
}
