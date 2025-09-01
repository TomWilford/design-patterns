<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Creator\Abstract;

use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Domain\Exception\NotificationDispatchException;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Infrastructure\Logger;
use creational\Singleton\Practical\Application\FeatureFlag\Factory\Practical\Module\Notification\Domain\Interface\Notifier;

abstract class NotificationFactory
{
    protected string $message;

    public function __construct(protected Logger $logger)
    {
        //
    }

    abstract public function getNotifier(): Notifier;

    public function setNotificationMessage(string $message): void
    {
        $this->message = $message;
    }

    public function dispatchNotification(): void
    {
        $notifier = $this->buildNotifier();
        $this->handleSending($notifier);
    }

    private function buildNotifier(): Notifier
    {
        $notifier = $this->getNotifier();
        $notifier->setMessage($this->message);

        return $notifier;
    }

    private function handleSending(Notifier $notifier): void
    {
        try {
            $notifier->send();
        } catch (\Throwable) {
            throw new NotificationDispatchException('Notification dispatch error');
        }
    }
}
