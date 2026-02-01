<?php

namespace TestCase\Creational\Prototype\Practical\Module\OutgoingLetter\Action;

use Creational\Prototype\Practical\Application\Concrete\Render\RenderWebUi;
use Creational\Prototype\Practical\Application\Interface\Render;
use Creational\Prototype\Practical\Module\OutgoingLetter\Action\CustomiseSelectedTemplateAction;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Clause;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Document;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Metadata;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\MetadataType;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Signatory;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Template\DefaultTemplate;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\ClauseRepository;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\SignatoryRepository;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template\DefaultTemplateRegistry;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CustomiseSelectedTemplateAction::class)]
class CustomiseSelectedTemplateActionTest extends TestCase
{
    private DefaultTemplateRegistry $defaultTemplateRegistry;

    protected function setUp(): void
    {
        $document = new Document(
            clause: new Clause(1, 'Test', 'Test'),
            signatory: new Signatory(1, 'Test', 'Test'),
            metadata: [
                new Metadata(MetadataType::DOCUMENT_TYPE, 'Foo Type'),
                new Metadata(MetadataType::DOCUMENT_VERSION, 'Foo Version'),
            ]
        );
        $registry = new DefaultTemplateRegistry();
        $registry->register(DefaultTemplate::NDA, $document);
        $this->defaultTemplateRegistry = $registry;
    }

    public function testExceptionThrownIfSelectedTemplateIsInvalid(): void
    {
        $render = $this->createStub(Render::class);
        $registry = $this->createStub(DefaultTemplateRegistry::class);
        $clauses = $this->createStub(ClauseRepository::class);
        $signatories = $this->createStub(SignatoryRepository::class);
        $sut = new CustomiseSelectedTemplateAction($render, $registry, $clauses, $signatories);

        $this->expectException(\Error::class);
        $sut([
            'selectedTemplate' => 'FOO',
        ]);
    }

    public function testAddresseeDefaultStringIsInResponseWhenNoAddresseeProvided(): void
    {
        $render = new RenderWebUi();
        $registry = $this->defaultTemplateRegistry;
        $clauses = $this->createStub(ClauseRepository::class);
        $signatories = $this->createStub(SignatoryRepository::class);
        $sut = new CustomiseSelectedTemplateAction($render, $registry, $clauses, $signatories);

        $result = $sut([
            'selectedTemplate' => DefaultTemplate::NDA->name,
        ]);

        $this->assertStringContainsString('To whom it may concern', $result);
    }

    public function testAddresseeInRequestIsInResponse(): void
    {
        $render = new RenderWebUi();
        $registry = $this->defaultTemplateRegistry;
        $clauses = $this->createStub(ClauseRepository::class);
        $signatories = $this->createStub(SignatoryRepository::class);
        $sut = new CustomiseSelectedTemplateAction($render, $registry, $clauses, $signatories);

        $result = $sut([
            'selectedTemplate' => DefaultTemplate::NDA->name,
            'addressee' => 'Dr Foo Bar',
        ]);

        $this->assertStringContainsString('Dr Foo Bar', $result);
    }
}
