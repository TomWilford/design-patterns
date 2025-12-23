<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Domain\Interface;

interface EmailSubjectInterface
{
    public function getContent(): string;
    public function getContentPreview(): string;
    public function getPlainTextContent(): string;
}
