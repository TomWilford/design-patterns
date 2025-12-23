<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Practical\Module\Email\Application\Builder\Concrete;

use Creational\Builder\Practical\Module\Email\Application\Builder\Concrete\PlainTextEmailBuilder;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PlainTextEmailBuilder::class)]
class PlainTextEmailBuilderTest extends TestCase
{
    public function testInstantiation(): void
    {
        $sut = new PlainTextEmailBuilder();
        $this->assertInstanceOf(PlainTextEmailBuilder::class, $sut);
    }


}
