<?php

namespace TestCase\Structural\Adapter\Conceptual\Application;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Structural\Adapter\Conceptual\Application\SendRequestAction;
use Structural\Adapter\Conceptual\Infrastructure\Request\Concrete\Adapter;
use Structural\Adapter\Conceptual\Infrastructure\Request\Interface\Target;
use Structural\Adapter\Conceptual\Module\Adaptee\Infrastructure\Request\Adaptee;

#[CoversClass(SendRequestAction::class)]
class SendRequestActionTest extends TestCase
{
    public function testInstantiation(): void
    {
        $target = $this->createStub(Target::class);
        $sut = new SendRequestAction($target);
        $this->assertInstanceOf(SendRequestAction::class, $sut);
    }

    public function testCanProcessTargetRequest(): void
    {
        $target = $this->createMock(Target::class);
        $target->expects($this->once())->method('sendRequest')->willReturn('Standard request');
        $sut = new SendRequestAction($target);

        $result = $sut();

        $this->assertEquals('Standard request', $result);
    }

    public function testCanProcessAdapteeRequestThroughAdapter(): void
    {
        $adaptee = new Adaptee();
        $adapter = new Adapter($adaptee);
        $sut = new SendRequestAction($adapter);

        $result = $sut();

        $this->assertEquals('Performing Adaptee\'s request', $result);
    }
}
