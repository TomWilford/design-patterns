<?php

namespace TestCase\Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template;

use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Clause;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Document;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Signatory;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Template\DefaultTemplate;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\ClauseRepository;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\SignatoryRepository;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template\DefaultTemplateLoader;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template\DefaultTemplateRegistry;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DefaultTemplateLoader::class)]
class DefaultTemplateLoaderTest extends TestCase
{
    public function testLoadAddsContractToRegistryIfNotPresent(): void
    {
        $registry = new DefaultTemplateRegistry();
        $clauses = $this->createStub(ClauseRepository::class);
        $signatories = $this->createStub(SignatoryRepository::class);
        $sut = new DefaultTemplateLoader(
            $registry,
            $clauses,
            $signatories
        );

        $this->assertFalse($registry->has(DefaultTemplate::CONTRACT));
        $sut->load();
        $this->assertTrue($registry->has(DefaultTemplate::CONTRACT));
    }

    public function testLoadDoesNotAddToRegistryIfDocumentsPresentAlready(): void
    {
        $registry = $this->createMock(DefaultTemplateRegistry::class);
        $registry->method('has')->willReturn(true);
        $registry->expects($this->never())->method('register');
        $clauses = $this->createStub(ClauseRepository::class);
        $signatories = $this->createStub(SignatoryRepository::class);
        $sut = new DefaultTemplateLoader(
            $registry,
            $clauses,
            $signatories
        );
        $sut->load();
    }
}
