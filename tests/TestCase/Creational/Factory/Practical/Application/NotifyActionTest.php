<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Application;

use Creational\Factory\Practical\Application\NotifyAction;
use Creational\Factory\Practical\Domain\Exception\NotificationDispatchException;
use Creational\Factory\Practical\Infrastructure\Logger;
use Creational\Factory\Practical\Module\Notification\Creator\Abstract\Creator;
use Creational\Factory\Practical\Module\Notification\Creator\Concrete\EmailNotificationCreator;
use Creational\Factory\Practical\Module\Notification\Creator\Concrete\PushNotificationCreator;
use Creational\Factory\Practical\Module\Notification\Creator\Concrete\SmsNotificationCreator;
use Creational\Factory\Practical\Module\Notification\Interface\Notifier;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\Attributes\UsesClassesThatImplementInterface;
use PHPUnit\Framework\TestCase;

#[UsesClassesThatImplementInterface(Creator::class)]
#[UsesClassesThatImplementInterface(Notifier::class)]
#[UsesClass(NotifyAction::class)]
class NotifyActionTest extends TestCase
{
    public function testEmailNotificationSendsMessage(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->with('Email notification sent with message: Foo');

        $sut = new NotifyAction();
        $sut(new EmailNotificationCreator($spy), 'Foo');
    }

    public function testEmailNotificationThrowsException(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->willThrowException(new NotificationDispatchException('Baa'));

        $sut = new NotifyAction();
        $this->expectException(NotificationDispatchException::class);
        $sut(new EmailNotificationCreator($spy), 'Foo');
    }

    public function testSmsNotificationSendsMessage(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->with('SMS notification sent with message: Foo');

        $sut = new NotifyAction();
        $sut(new SmsNotificationCreator($spy), 'Foo');
    }

    public function testSmsNotificationThrowsException(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->willThrowException(new NotificationDispatchException('Baa'));

        $sut = new NotifyAction();
        $this->expectException(NotificationDispatchException::class);
        $sut(new SmsNotificationCreator($spy), 'Foo');
    }

    public function testPushNotificationSendsMessage(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->with('Push notification sent with message: Foo');

        $sut = new NotifyAction();
        $sut(new PushNotificationCreator($spy), 'Foo');
    }

    public function testPushNotificationThrowsException(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->willThrowException(new NotificationDispatchException('Baa'));

        $sut = new NotifyAction();
        $this->expectException(NotificationDispatchException::class);
        $sut(new PushNotificationCreator($spy), 'Foo');
    }
}
