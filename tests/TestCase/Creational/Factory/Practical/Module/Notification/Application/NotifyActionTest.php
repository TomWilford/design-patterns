<?php

declare(strict_types=1);

namespace TestCase\Creational\Factory\Practical\Module\Notification\Application;

use Creational\Factory\Practical\Domain\Exception\NotificationDispatchException;
use Creational\Factory\Practical\Infrastructure\Logger;
use Creational\Factory\Practical\Module\Notification\Application\NotifyAction;
use Creational\Factory\Practical\Module\Notification\Domain\Factory\Abstract\NotificationFactory;
use Creational\Factory\Practical\Module\Notification\Domain\Factory\Concrete\EmailNotificationFactory;
use Creational\Factory\Practical\Module\Notification\Domain\Factory\Concrete\PushNotificationFactory;
use Creational\Factory\Practical\Module\Notification\Domain\Factory\Concrete\SmsNotificationFactory;
use Creational\Factory\Practical\Module\Notification\Domain\Interface\Notifier;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\Attributes\UsesClassesThatExtendClass;
use PHPUnit\Framework\Attributes\UsesClassesThatImplementInterface;
use PHPUnit\Framework\TestCase;

#[CoversClass(NotifyAction::class)]
#[UsesClassesThatExtendClass(NotificationFactory::class)]
class NotifyActionTest extends TestCase
{
    public function testEmailNotificationSendsMessage(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->with('Email notification sent with message: Foo');

        $sut = new NotifyAction();
        $sut(new EmailNotificationFactory($spy), 'Foo');
    }

    public function testEmailNotificationThrowsException(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->willThrowException(new NotificationDispatchException('Baa'));

        $sut = new NotifyAction();
        $this->expectException(NotificationDispatchException::class);
        $sut(new EmailNotificationFactory($spy), 'Foo');
    }

    public function testSmsNotificationSendsMessage(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->with('SMS notification sent with message: Foo');

        $sut = new NotifyAction();
        $sut(new SmsNotificationFactory($spy), 'Foo');
    }

    public function testSmsNotificationThrowsException(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->willThrowException(new NotificationDispatchException('Baa'));

        $sut = new NotifyAction();
        $this->expectException(NotificationDispatchException::class);
        $sut(new SmsNotificationFactory($spy), 'Foo');
    }

    public function testPushNotificationSendsMessage(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->with('Push notification sent with message: Foo');

        $sut = new NotifyAction();
        $sut(new PushNotificationFactory($spy), 'Foo');
    }

    public function testPushNotificationThrowsException(): void
    {
        $spy = $this->createMock(Logger::class);
        $spy->expects($this->once())
            ->method('log')
            ->willThrowException(new NotificationDispatchException('Baa'));

        $sut = new NotifyAction();
        $this->expectException(NotificationDispatchException::class);
        $sut(new PushNotificationFactory($spy), 'Foo');
    }
}
