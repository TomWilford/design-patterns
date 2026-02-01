<?php

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Template;

use Creational\Prototype\Practical\Application\Interface\Prototype;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Document;
use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Template\DefaultTemplate;
use RuntimeException;

class DefaultTemplateRegistry
{
    /**
     * @var array<Prototype>
     */
    private array $templates = [];

    public function register(DefaultTemplate $key, Prototype $template): void
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
