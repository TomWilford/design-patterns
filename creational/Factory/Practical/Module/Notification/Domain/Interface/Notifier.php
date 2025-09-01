<?php

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Interface;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Domain\Exception\NotificationDispatchException;

interface Notifier
{
    public function setMessage(string $message): void;

    /**
     * @throws NotificationDispatchException
     */
    public function send(): void;
}
