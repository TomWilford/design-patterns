<?php

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Application\Action;

use Creational\Prototype\Practical\Application\Interface\Render;
use Creational\Prototype\Practical\Module\OutgoingLetter\Application\Request\UpdateDocumentFromRequest;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Template\DefaultTemplate;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template\DefaultTemplateRegistry;

class CustomiseSelectedTemplateAction
{
    public function __construct(
        private Render $render,
        private DefaultTemplateRegistry $registry,
        private UpdateDocumentFromRequest $documentFromRequest
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
    public function __invoke(array $request): string
    {
        $selectedTemplate = DefaultTemplate::{$request['selectedTemplate']};
        $document = $this->registry->createFromTemplate($selectedTemplate);

        $this->documentFromRequest->update($request, $document);

        return $this->render->output([
            'document' => $document->make(),
        ]);
    }
}
