<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Module\Email\Application\Builder\Concrete;

use Creational\Builder\Practical\Module\Email\Application\Builder\Concrete\BaseEmailBuilder;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Part\EmailBody;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBodyInterface;

class HtmlEmailBuilder extends BaseEmailBuilder
{
    public function setBody(EmailBodyInterface $body): void
    {
        $this->email->setBody($this->createHtmlBody($body));
    }

    private function createHtmlBody(EmailBodyInterface $emailBody): EmailBodyInterface
    {
        return new EmailBody(
            $this->getHeaderHtml() . nl2br($emailBody->getContent()) . $this->getFooterHtml()
        );
    }

    private function getHeaderHtml(): string
    {
        return <<<HTML
        <html lang="uk">
            <head>
                <title>{$this->email->getSubject()->getContent()}</title>
            </head>
            <body>
        HTML;
    }

    private function getFooterHtml(): string
    {
        return <<<HTML
            </body>
        </html>
        HTML;
    }
}
