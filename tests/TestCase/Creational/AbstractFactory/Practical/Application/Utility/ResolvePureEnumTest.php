<?php

declare(strict_types=1);

namespace TestCase\Creational\AbstractFactory\Practical\Application\Utility;

use Creational\AbstractFactory\Practical\Application\Exception\NotFoundException;
use Creational\AbstractFactory\Practical\Module\Payment\Domain\Entity\Gateway\Gateway;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Gateway::class)]
class ResolvePureEnumTest extends TestCase
{
    public function testResolveOr404SuccessfullyReturnsEnumForValidValue()
    {
        $this->assertSame(
            Gateway::PAYPAL,
            Gateway::resolveOr404('PAYPAL')
        );
    }

    public function testResolveOr404SuccessfullyReturnsEnumForValidLowercaseValue()
    {
        $this->assertSame(
            Gateway::STRIPE,
            Gateway::resolveOr404('stripe')
        );
    }

    public function testResolveOr404SuccessfullyThrowsNotFoundExceptionForInvalidValue()
    {
        $this->expectException(NotFoundException::class);
        Gateway::resolveOr404('INVALID');
    }
}
