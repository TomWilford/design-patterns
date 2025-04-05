<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Notification\Entity;

use Creational\Factory\Practical\Domain\Exception\NotificationDispatchException;
use Creational\Factory\Practical\Infrastructure\Logger;
use Creational\Factory\Practical\Module\Notification\Interface\Notifier;

class EmailNotifier implements Notifier
{
    private string $message;

    public function __construct(private readonly Logger $logger)
    {
        //
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @inheritDoc
     */
    public function send(): void
    {
        $this->logger->log('Email notification sent with message: ' . $this->message);
    }
}
