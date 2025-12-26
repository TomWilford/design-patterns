<?php

namespace TestCase\Creational\Builder\Practical\Module\Email\Application\Builder\Concrete;

use Creational\Builder\Practical\Module\Email\Application\Builder\Concrete\HtmlEmailBuilder;
use Creational\Builder\Practical\Module\Email\Application\Builder\Interface\EmailBuilder;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Part\EmailAttachments;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Part\EmailBCC;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Part\EmailBody;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Part\EmailCC;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Part\EmailRecipient;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Part\EmailSender;
use Creational\Builder\Practical\Module\Email\Domain\Entity\Part\EmailSubject;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBodyInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(HtmlEmailBuilder::class)]
class HtmlEmailBuilderTest extends TestCase
{
    public function testInstantiation(): void
    {
        $sut = new HtmlEmailBuilder();
        $this->assertInstanceOf(EmailBuilder::class, $sut);
    }

    public function testEmailBuildsWithSubject(): void
    {
        $subjectStub = $this->createStub(EmailSubject::class);

        $sut = new HtmlEmailBuilder();
        $sut->newEmail();
        $sut->setSubject($subjectStub);

        $result = $sut->getEmail();
        $this->assertEquals($subjectStub, $result->getSubject());
    }

    public function testEmailBuildsWithBody(): void
    {
        $bodyStub = $this->createStub(EmailBody::class);
        $subjectStub = $this->createStub(EmailSubject::class);

        $sut = new HtmlEmailBuilder();
        $sut->newEmail();
        $sut->setSubject($subjectStub);
        $sut->setBody($bodyStub);

        $result = $sut->getEmail();
        $this->assertInstanceOf(EmailBodyInterface::class, $result->getBody());
    }

    public function testSetBodyWithoutSubjectCreatesEmailWithBlankTitle(): void
    {
        $bodyStub = $this->createStub(EmailBody::class);
        $subjectStub = $this->createStub(EmailSubject::class);

        $sut = new HtmlEmailBuilder();
        $sut->newEmail();
        $sut->setBody($bodyStub);

        $result = $sut->getEmail();

        $this->assertStringContainsString('<title></title>', $result->getBody()->getContent());
    }

    public function testEmailBuildsWithAttachments(): void
    {
        $attachmentsStub = $this->createStub(EmailAttachments::class);

        $sut = new HtmlEmailBuilder();
        $sut->newEmail();
        $sut->setAttachments($attachmentsStub);

        $result = $sut->getEmail();
        $this->assertEquals($attachmentsStub, $result->getAttachments());
    }

    public function testEmailBuildsWithSender(): void
    {
        $senderStub = $this->createStub(EmailSender::class);

        $sut = new HtmlEmailBuilder();
        $sut->newEmail();
        $sut->setSender($senderStub);

        $result = $sut->getEmail();
        $this->assertEquals($senderStub, $result->getSender());
    }

    public function testEmailBuildsWithRecipient(): void
    {
        $recipientStub = $this->createStub(EmailRecipient::class);

        $sut = new HtmlEmailBuilder();
        $sut->newEmail();
        $sut->setRecipient($recipientStub);

        $result = $sut->getEmail();
        $this->assertEquals($recipientStub, $result->getRecipient());
    }

    public function testEmailBuildsWithCC(): void
    {
        $ccStub = $this->createStub(EmailCC::class);

        $sut = new HtmlEmailBuilder();
        $sut->newEmail();
        $sut->setCC($ccStub);

        $result = $sut->getEmail();
        $this->assertEquals($ccStub, $result->getCc());
    }

    public function testEmailBuildsWithBCC(): void
    {
        $bccStub = $this->createStub(EmailBCC::class);

        $sut = new HtmlEmailBuilder();
        $sut->newEmail();
        $sut->setBCC($bccStub);

        $result = $sut->getEmail();
        $this->assertEquals($bccStub, $result->getBcc());
    }
}
