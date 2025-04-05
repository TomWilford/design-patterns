<?php

namespace Creational\Factory\Practical\Module\Notification\Interface;

use Creational\Factory\Practical\Domain\Exception\NotificationDispatchException;

interface Notifier
{
    public function setMessage(string $message): void;

    /**
     * @throws NotificationDispatchException
     */
    public function send(): void;
}
