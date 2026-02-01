<?php

namespace TestCase\Creational\Prototype\Conceptual\Module\Product\Application;

use Creational\Prototype\Conceptual\Infrastructure\Log\Logger;
use Creational\Prototype\Conceptual\Module\Product\Application\DefaultCloneAction;
use Creational\Prototype\Conceptual\Module\Product\Domain\Product;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DefaultCloneAction::class)]
#[CoversClass(Product::class)]
class DefaultCloneActionTest extends TestCase
{
    public function testInvokeLogsCorrectMessages(): void
    {
        $expectedMessages = [
            sprintf(
                "Product: %s | Price: %s | Category: %s | Features: %s",
                'Laptop - Base Model',
                1000,
                'Electronics',
                '16GB RAM, SSD Storage'
            ),
            sprintf(
                "Product: %s | Price: %s | Category: %s | Features: %s",
                'Laptop - Premium Model',
                2000,
                'Electronics',
                '16GB RAM, SSD Storage, Dedicated GPU, RGB Keyboard'
            ),
            'Electronics',
            'Electronics',
            'Electronics',
            'Premium Electronics',
        ];

        $matcher = $this->exactly(count($expectedMessages));

        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($matcher)
            ->method('log')->willReturnCallback(
                function (string $message) use ($matcher, $expectedMessages) {
                    $index = $matcher->numberOfInvocations() - 1;
                    $this->assertSame($expectedMessages[$index], $message);
                }
            );
        $action = new DefaultCloneAction($loggerSpy);

        $action();
    }
}
