<?php

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Application\Request;

use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Document;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\ClauseRepository;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\SignatoryRepository;

class UpdateDocumentFromRequest
{
    public function __construct(
        private readonly ClauseRepository $clauses,
        private readonly SignatoryRepository $signatories
    ) {
    }

    /**
     * @param array{
     *     'addressee'?: string,
     *     'clause'?: int,
     *     'signatory'?: int,
     *     'header'?: string,
     *     'body'?: string,
     *     'signoff'?: string
     * } $request
     */
    public function update(array $request, Document $document): void
    {
        $this->handleAddressee($request, $document);
        $this->handleClause($request, $document);
        $this->handleSignatory($request, $document);
        $this->handleHeader($request, $document);
        $this->handleBody($request, $document);
        $this->handleSignoff($request, $document);
    }

    /**
     * @param array{
     *     'addressee'?: string,
     *     'clause'?: int,
     *     'signatory'?: int,
     *     'header'?: string,
     *     'body'?: string,
     *     'signoff'?: string
     * } $request
     */
    private function handleAddressee(array $request, Document $document): void
    {
        $addressee = $request['addressee'] ?? null;
        if ($addressee !== null) {
            $document->setAddressee($addressee);
        }
    }

    /**
     * @param array{
     *     'addressee'?: string,
     *     'clause'?: int,
     *     'signatory'?: int,
     *     'header'?: string,
     *     'body'?: string,
     *     'signoff'?: string
     * } $request
     */
    private function handleClause(array $request, Document $document): void
    {
        $clause = $request['clause'] ?? null;
        if ($clause !== null) {
            $document->setClause($this->clauses->find($clause));
        }
    }

    /**
     * @param array{
     *     'addressee'?: string,
     *     'clause'?: int,
     *     'signatory'?: int,
     *     'header'?: string,
     *     'body'?: string,
     *     'signoff'?: string
     * } $request
     */
    private function handleSignatory(array $request, Document $document): void
    {
        $signatory = $request['signatory'] ?? null;
        if ($signatory !== null) {
            $document->setSignatory($this->signatories->find($signatory));
        }
    }

    /**
     * @param array{
     *     'addressee'?: string,
     *     'clause'?: int,
     *     'signatory'?: int,
     *     'header'?: string,
     *     'body'?: string,
     *     'signoff'?: string
     * } $request
     */
    private function handleHeader(array $request, Document $document): void
    {
        $header = $request['header'] ?? null;
        if ($header !== null) {
            $document->setHeader($header);
        }
    }

    /**
     * @param array{
     *     'addressee'?: string,
     *     'clause'?: int,
     *     'signatory'?: int,
     *     'header'?: string,
     *     'body'?: string,
     *     'signoff'?: string
     * } $request
     */
    private function handleBody(array $request, Document $document): void
    {
        $body = $request['body'] ?? null;
        if ($body !== null) {
            $document->setBody($body);
        }
    }

    /**
     * @param array{
     *     'addressee'?: string,
     *     'clause'?: int,
     *     'signatory'?: int,
     *     'header'?: string,
     *     'body'?: string,
     *     'signoff'?: string
     * } $request
     */
    private function handleSignoff(array $request, Document $document): void
    {
        $signoff = $request['signoff'] ?? null;
        if ($signoff !== null) {
            $document->setSignoff($signoff);
        }
    }
}
