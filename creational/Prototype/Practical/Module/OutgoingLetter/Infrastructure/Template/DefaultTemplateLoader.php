<?php

declare(strict_types=1);

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template;

use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Document;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Template\DefaultTemplate;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\ClauseRepository;
use Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository\SignatoryRepository;

class DefaultTemplateLoader
{
    public function __construct(
        private DefaultTemplateRegistry $registry,
        private ClauseRepository $clauses,
        private SignatoryRepository $signatories
    ) {
    }

    public function load(): void
    {
        if (!$this->registry->has(DefaultTemplate::CONTRACT)) {
            $this->registerContract();
        }

        if (!$this->registry->has(DefaultTemplate::NDA)) {
            $this->registerNda();
        }

        if (!$this->registry->has(DefaultTemplate::EMPLOYMENT_AGREEMENT)) {
            $this->registerEmploymentAgreement();
        }
    }

    private function registerContract(): void
    {
        $this->registry->register(
            DefaultTemplate::CONTRACT,
            new Document(
                $this->clauses->find(2),
                $this->signatories->find(1)
            )
        );
    }

    private function registerNda(): void
    {
        $this->registry->register(
            DefaultTemplate::NDA,
            new Document(
                $this->clauses->find(3),
                $this->signatories->find(2)
            )
        );
    }

    private function registerEmploymentAgreement(): void
    {
        $this->registry->register(
            DefaultTemplate::EMPLOYMENT_AGREEMENT,
            new Document(
                $this->clauses->find(2),
                $this->signatories->find(4)
            )
        );
    }
}
