<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Practical\Module\Email\Application\Builder\Concrete;

use Creational\Builder\Practical\Module\Email\Application\Builder\Concrete\PlainTextEmailBuilder;
use Creational\Builder\Practical\Module\Email\Application\Builder\Interface\EmailBuilder;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Part\EmailSubject;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PlainTextEmailBuilder::class)]
class PlainTextEmailBuilderTest extends TestCase
{
    public function testInstantiation(): void
    {
        $sut = new PlainTextEmailBuilder();
        $this->assertInstanceOf(EmailBuilder::class, $sut);
    }

    public function testEmailBuildsWithSubject(): void
    {
        $subjectStub = $this->createStub(EmailSubject::class);

        $sut = new PlainTextEmailBuilder();
        $sut->newEmail();
        $sut->setSubject($subjectStub);

        $result = $sut->getEmail();
        $this->assertEquals($subjectStub, $result->getSubject());
    }
}
