<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Entity\Part;

use Creational\Builder\Practical\Application\Utilities\StringFormatterTrait;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBodyInterface;

readonly class EmailBody implements EmailBodyInterface
{
    use StringFormatterTrait;

    public function __construct(private string $content)
    {
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getContentPreview(): string
    {
        return $this->ellipsisString($this->getPlainTextContent());
    }

    public function getPlainTextContent(): string
    {
        return $this->stringToPlainText($this->content);
    }
}
