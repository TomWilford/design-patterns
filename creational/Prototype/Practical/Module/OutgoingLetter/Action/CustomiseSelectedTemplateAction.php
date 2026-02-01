<?php

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Action;

use Creational\Prototype\Practical\Application\Interface\Render;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Template\DefaultTemplate;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\ClauseRepository;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\SignatoryRepository;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template\DefaultTemplateRegistry;

class CustomiseSelectedTemplateAction
{
    public function __construct(
        private Render $render,
        private DefaultTemplateRegistry $registry,
        private ClauseRepository $clauses,
        private SignatoryRepository $signatories
    ) {
    }

    /**
     * @param array{
     *     'selectedTemplate': string,
     *     'addressee'?: string,
     *     'clause'?: int,
     *     'signatory'?: int,
     *     'header'?: string,
     *     'body'?: string,
     *     'signoff'?: string
     * } $request
     * @return string
     */
    public function __invoke(array $request = []): string
    {
        $selectedTemplate = DefaultTemplate::{$request['selectedTemplate']};
        $document = $this->registry->createFromTemplate($selectedTemplate);

        $addressee = $request['addressee'] ?? null;
        if ($addressee !== null) {
            $document->setAddressee($addressee);
        }

        $clause = $request['clause'] ?? null;
        if ($clause !== null) {
            $document->setClause($this->clauses->find($clause));
        }

        $signatory = $request['signatory'] ?? null;
        if ($signatory !== null) {
            $document->setSignatory($this->signatories->find($signatory));
        }

        $header = $request['header'] ?? null;
        if ($header !== null) {
            $document->setHeader($header);
        }

        $body = $request['body'] ?? null;
        if ($body !== null) {
            $document->setBody($body);
        }

        $signoff = $request['signoff'] ?? null;
        if ($signoff !== null) {
            $document->setSignoff($signoff);
        }

        return $this->render->output([
            'document' => $document->make(),
        ]);
    }
}
