<?php

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document;

use Creational\Prototype\Practical\Application\Interface\Prototype;

class Document implements Prototype
{
    /**
     * @param array<Metadata> $metadata
     */
    public function __construct(
        private Clause $clause,
        private Signatory $signatory,
        private ?string $addressee = null,
        private string $header = '',
        private string $body = '',
        private string $signoff = '',
        private array $metadata = [],
    ) {
    }

    public function make(): string
    {
        return <<<DOC
        {$this->clause->getContent()}
        
        {$this->makeAddressee()},
        
        $this->header
        
        $this->body
        
        $this->signoff
        
        {$this->signatory->getContent()}
        
        {$this->makeMetadata()}
        DOC;
    }

    private function makeAddressee(): string
    {
        return $this->addressee
            ? 'Dear ' . $this->addressee
            : 'To whom it may concern';
    }

    private function makeMetadata(): string
    {
        return implode(
            ' | ',
            array_map(
                fn(Metadata $md) => $md->getType()->toString() . ' ' . $md->getValue(),
                $this->metadata
            )
        );
    }

    public function clone(): self
    {
        return clone($this, [
            "clause" => clone $this->clause,
            "signatory" => clone $this->signatory,
            "metadata" => $this->cloneMetadata()
        ]);
    }

    /**
     * @return array<Metadata>
     */
    private function cloneMetadata(): array
    {
        return array_map(
            fn(Metadata $metadatum) => clone $metadatum,
            $this->metadata
        );
    }

    public function getClause(): Clause
    {
        return $this->clause;
    }

    public function setClause(Clause $clause): void
    {
        $this->clause = $clause;
    }

    public function getSignatory(): Signatory
    {
        return $this->signatory;
    }

    public function setSignatory(Signatory $signatory): void
    {
        $this->signatory = $signatory;
    }

    public function getAddressee(): ?string
    {
        return $this->addressee;
    }

    public function setAddressee(string $addressee): void
    {
        $this->addressee = $addressee;
    }

    public function getHeader(): string
    {
        return $this->header;
    }

    public function setHeader(string $header): void
    {
        $this->header = $header;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function getSignoff(): string
    {
        return $this->signoff;
    }

    public function setSignoff(string $signoff): void
    {
        $this->signoff = $signoff;
    }

    /**
     * @return array<Metadata>
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function setMetadata(array $metadata): void
    {
        $this->metadata = $metadata;
    }

    public function addMetadata(Metadata $metadata): void
    {
        $this->metadata[] = $metadata;
    }
}
