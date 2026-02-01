<?php

namespace TestCase\Creational\Prototype\Conceptual\Module\Product\Application;

use Creational\Prototype\Conceptual\Infrastructure\Log\Logger;
use Creational\Prototype\Conceptual\Module\Product\Application\RegistryCloneAction;
use Creational\Prototype\Conceptual\Module\Product\Domain\Product;
use Creational\Prototype\Conceptual\Module\Product\Domain\ProductCategory;
use Creational\Prototype\Conceptual\Module\Product\Infrastructure\ProductPrototypeRegistry;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RegistryCloneAction::class)]
#[CoversClass(ProductPrototypeRegistry::class)]
class RegistryCloneActionTest extends TestCase
{
    public function testRegistryCanUsePrototypesToCreateAdditionalProducts(): void
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
            sprintf(
                "Product: %s | Price: %s | Category: %s | Features: %s",
                'Laptop - Base Model',
                1999,
                'Electronics',
                '16GB RAM, SSD Storage, With 22" Monitor'
            ),
            sprintf(
                "Product: %s | Price: %s | Category: %s | Features: %s",
                'Laptop - Premium Model',
                2999,
                'Electronics',
                '16GB RAM, SSD Storage, Dedicated GPU, RGB Keyboard, With 22" Monitor'
            ),
        ];

        $electronicsCategory = new ProductCategory('Electronics', 'Technology');
        $registry = new ProductPrototypeRegistry();
        $registry->addPrototype('basic', new Product(
            name: 'Laptop - Base Model',
            price: 1000,
            category: $electronicsCategory,
            features: ['16GB RAM', 'SSD Storage']
        ));
        $registry->addPrototype('premium', new Product(
            name: 'Laptop - Premium Model',
            price: 2000,
            category: $electronicsCategory,
            features: ['16GB RAM', 'SSD Storage', 'Dedicated GPU', 'RGB Keyboard']
        ));

        $matcher = $this->exactly(count($expectedMessages));

        $loggerSpy = $this->createMock(Logger::class);
        $loggerSpy->expects($matcher)
            ->method('log')->willReturnCallback(
                function (string $message) use ($matcher, $expectedMessages) {
                    $index = $matcher->numberOfInvocations() - 1;
                    $this->assertSame($expectedMessages[$index], $message);
                }
            );
        $action = new RegistryCloneAction($loggerSpy, $registry);

        $action();
    }
}
