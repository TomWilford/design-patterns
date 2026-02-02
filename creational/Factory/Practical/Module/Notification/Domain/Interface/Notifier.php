<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Notification\Domain\Interface;

use Creational\Factory\Practical\Domain\Exception\NotificationDispatchException;

interface Notifier
{
    public function setMessage(string $message): void;

    /**
     * @throws NotificationDispatchException
     */
    public function send(): void;
}
