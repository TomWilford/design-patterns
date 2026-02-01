<?php

namespace TestCase\Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template;

use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Clause;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Document;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Signatory;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Template\DefaultTemplate;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template\DefaultTemplateRegistry;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RuntimeException;

#[CoversClass(DefaultTemplateRegistry::class)]
class DefaultTemplateRegistryTest extends TestCase
{
    public function testHasReturnsFalseWhenTemplateKeyNotRegistered(): void
    {
        $sut = new DefaultTemplateRegistry();

        $this->assertFalse($sut->has(DefaultTemplate::NDA));
    }

    public function testRegisterCanRegisterNewTemplate(): void
    {
        $document = new Document(
            new Clause(1, 'Test', 'Test'),
            new Signatory(1, 'Test', 'Test'),
        );
        $sut = new DefaultTemplateRegistry();

        $this->expectNotToPerformAssertions();
        $sut->register(DefaultTemplate::NDA, $document);
    }

    public function testHasReturnsTrueWhenTemplateKeyRegistered(): void
    {
        $document = new Document(
            new Clause(1, 'Test', 'Test'),
            new Signatory(1, 'Test', 'Test'),
        );
        $sut = new DefaultTemplateRegistry();
        $sut->register(DefaultTemplate::NDA, $document);

        $this->assertTrue($sut->has(DefaultTemplate::NDA));
    }

    public function testCreateFromTemplateReturnsNewInstanceOfTemplate(): void
    {
        $document = new Document(
            new Clause(1, 'Test', 'Test'),
            new Signatory(1, 'Test', 'Test'),
        );
        $sut = new DefaultTemplateRegistry();
        $sut->register(DefaultTemplate::NDA, $document);

        $result = $sut->createFromTemplate(DefaultTemplate::NDA);

        $this->assertNotSame($document, $result);
    }

    public function testCreateFromTemplateThrowsExceptionWhenTemplateNotFound(): void
    {
        $sut = new DefaultTemplateRegistry();

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Template NDA not found');

        $sut->createFromTemplate(DefaultTemplate::NDA);
    }
}
