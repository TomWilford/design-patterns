<?php

declare(strict_types=1);

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template;

use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Document;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Template\DefaultTemplate;
use RuntimeException;

class DefaultTemplateRegistry
{
    /**
     * @var array<Document>
     */
    private array $templates = [];

    public function register(DefaultTemplate $key, Document $template): void
    {
        $this->templates[$key->name] = $template;
    }

    public function has(DefaultTemplate $key): bool
    {
        return array_key_exists($key->name, $this->templates);
    }

    /**
     * @throws RuntimeException
     */
    public function createFromTemplate(DefaultTemplate $key): Document
    {
        $document = $this->templates[$key->name] ?? throw new RuntimeException("Template $key->name not found");
        return $document->clone();
    }
}
