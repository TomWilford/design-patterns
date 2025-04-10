<?php

declare(strict_types=1);

namespace Creational\Factory\Practical\Module\Notification\Domain\Entity;

use Creational\Factory\Practical\Infrastructure\Logger;
use Creational\Factory\Practical\Module\Notification\Domain\Interface\Notifier;

class SmsNotifier implements Notifier
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
        $this->logger->log('SMS notification sent with message: ' . $this->message);
    }
}
