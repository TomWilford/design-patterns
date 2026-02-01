<?php

namespace TestCase\Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document;

use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Clause;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Document;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Metadata;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\MetadataType;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Signatory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Document::class)]
class DocumentTest extends TestCase
{
    public function testMakeCreatesStringWithDefaultAddresseeText(): void
    {
        $sut = new Document(
            new Clause(1, 'Test', 'Test'),
            new Signatory(1, 'Test', 'Test'),
        );

        $result = $sut->make();

        $this->assertStringContainsString('To whom it may concern', $result);
    }

    public function testMakeCreatesStringWithSuppliedAddressee(): void
    {
        $sut = new Document(
            new Clause(1, 'Test', 'Test'),
            new Signatory(1, 'Test', 'Test'),
            'Addressee Test'
        );

        $result = $sut->make();

        $this->assertStringContainsString('Addressee Test', $result);
    }

    public function testMakeCreatesStringWithSuppliedAddresseeFromSetter(): void
    {
        $sut = new Document(
            new Clause(1, 'Test', 'Test'),
            new Signatory(1, 'Test', 'Test'),
        );

        $sut->setAddressee('Addressee Test');

        $result = $sut->make();

        $this->assertStringContainsString('Addressee Test', $result);
    }

    public function testMakeCreatesMetadataString(): void
    {
        $sut = new Document(
            clause: new Clause(1, 'Test', 'Test'),
            signatory: new Signatory(1, 'Test', 'Test'),
            metadata: [
                new Metadata(MetadataType::DOCUMENT_TYPE, 'Foo Type'),
                new Metadata(MetadataType::DOCUMENT_VERSION, 'Foo Version')
            ]
        );

        $result = $sut->make();

        $this->assertStringContainsString('Type: Foo Type | Version: Foo Version', $result);
    }

    public function testCloneCreatesNewInstanceOfDocument(): void
    {
        $sut = new Document(
            clause: new Clause(1, 'Test', 'Test'),
            signatory: new Signatory(1, 'Test', 'Test'),
        );

        $result = $sut->clone();

        $this->assertNotSame($sut, $result);
    }

    public function testCloneCreatesNewInstanceOfClause(): void
    {
        $sut = new Document(
            clause: new Clause(1, 'Test', 'Test'),
            signatory: new Signatory(1, 'Test', 'Test'),
        );

        $result = $sut->clone();

        $this->assertSame($sut->getClause()->getId(), $result->getClause()->getId());
        $this->assertNotSame($sut->getClause(), $result->getClause());
    }

    public function testCloneCreatesNewInstanceOfSignatory(): void
    {
        $sut = new Document(
            clause: new Clause(1, 'Test', 'Test'),
            signatory: new Signatory(1, 'Test', 'Test'),
        );

        $result = $sut->clone();

        $this->assertSame($sut->getSignatory()->getId(), $result->getSignatory()->getId());
        $this->assertNotSame($sut->getSignatory(), $result->getSignatory());
    }

    public function testCloneCreatesNewInstancesOfMetadata(): void
    {
        $sut = new Document(
            clause: new Clause(1, 'Test', 'Test'),
            signatory: new Signatory(1, 'Test', 'Test'),
            metadata: [
                new Metadata(MetadataType::DOCUMENT_TYPE, 'Foo Type'),
            ]
        );

        $result = $sut->clone();

        $this->assertSame(
            array_first($sut->getMetadata())->getValue(),
            array_first($result->getMetadata())->getValue()
        );
        $this->assertNotSame(
            array_first($sut->getMetadata()),
            array_first($result->getMetadata())
        );
    }

    public function testModifyingClonedDocumentDoesNotAffectOriginalTemplate(): void
    {
        $original = new Document(
            clause: new Clause(1, 'Test', 'Test'),
            signatory: new Signatory(1, 'Test', 'Test'),
            header: 'Original Header'
        );

        $clone = $original->clone();
        $clone->setHeader('Modified Header');

        $this->assertEquals('Original Header', $original->getHeader());
        $this->assertEquals('Modified Header', $clone->getHeader());
    }
}
