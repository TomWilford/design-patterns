<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Notification\Creator\Concrete;

use Creational\Factory\Practical\Module\Notification\Creator\Abstract\Creator;
use Creational\Factory\Practical\Module\Notification\Entity\SmsNotifier;
use Creational\Factory\Practical\Module\Notification\Interface\Notifier;

class SmsNotificationCreator extends Creator
{
    public function getNotifier(): Notifier
    {
        return new SmsNotifier($this->logger);
    }
}
