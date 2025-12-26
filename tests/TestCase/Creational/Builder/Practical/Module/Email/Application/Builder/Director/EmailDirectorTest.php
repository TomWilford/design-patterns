<?php

namespace TestCase\Creational\Builder\Practical\Module\Email\Application\Builder\Director;

use Creational\Builder\Practical\Module\Email\Application\Builder\Director\EmailDirector;
use Creational\Builder\Practical\Module\Email\Application\Builder\Interface\EmailBuilder;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailAttachmentsInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBCCInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailBodyInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSenderInterface;
use Creational\Builder\Practical\Module\Email\Domain\Interface\EmailSubjectInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(EmailDirector::class)]
class EmailDirectorTest extends TestCase
{
    public function testInstantiation(): void
    {
        $sut = new EmailDirector();
        $this->assertInstanceOf(EmailDirector::class, $sut);
    }

    public function testBuildPlainEmailCallsCorrectMethods(): void
    {
        $builderMock = $this->createMock(EmailBuilder::class);
        $builderMock->expects($this->once())->method('newEmail');
        $builderMock->expects($this->once())
            ->method('setSubject');
        $builderMock->expects($this->once())
            ->method('setBody');
        $builderMock->expects($this->once())
            ->method('setSender');
        $subjectMock = $this->createStub(EmailSubjectInterface::class);
        $bodyMock = $this->createStub(EmailBodyInterface::class);
        $senderMock = $this->createStub(EmailSenderInterface::class);
        $sut = new EmailDirector();
        $sut->setEmailBuilder($builderMock);

        $sut->buildStandardEmail($subjectMock, $bodyMock, $senderMock);
    }

    public function testBuildMarketingEmailWithoutAttachmentCallsCorrectMethods(): void
    {
        $builderMock = $this->createMock(EmailBuilder::class);
        $builderMock->expects($this->once())->method('newEmail');
        $builderMock->expects($this->once())
            ->method('setSubject');
        $builderMock->expects($this->once())
            ->method('setBody');
        $builderMock->expects($this->once())
            ->method('setSender');
        $builderMock->expects($this->once())
            ->method('setBCC');
        $builderMock->expects($this->never())
            ->method('setAttachments');
        $subjectMock = $this->createStub(EmailSubjectInterface::class);
        $bodyMock = $this->createStub(EmailBodyInterface::class);
        $senderMock = $this->createStub(EmailSenderInterface::class);
        $bccMock = $this->createStub(EmailBCCInterface::class);
        $sut = new EmailDirector();
        $sut->setEmailBuilder($builderMock);

        $sut->buildMarketingEmail($subjectMock, $bodyMock, $senderMock, $bccMock);
    }

    public function testBuildMarketingEmailWithAttachmentCallsCorrectMethods(): void
    {
        $builderMock = $this->createMock(EmailBuilder::class);
        $builderMock->expects($this->once())->method('newEmail');
        $builderMock->expects($this->once())
            ->method('setSubject');
        $builderMock->expects($this->once())
            ->method('setBody');
        $builderMock->expects($this->once())
            ->method('setSender');
        $builderMock->expects($this->once())
            ->method('setBCC');
        $builderMock->expects($this->once())
            ->method('setAttachments');
        $subjectMock = $this->createStub(EmailSubjectInterface::class);
        $bodyMock = $this->createStub(EmailBodyInterface::class);
        $senderMock = $this->createStub(EmailSenderInterface::class);
        $bccMock = $this->createStub(EmailBCCInterface::class);
        $attachmentMock = $this->createStub(EmailAttachmentsInterface::class);
        $sut = new EmailDirector();
        $sut->setEmailBuilder($builderMock);

        $sut->buildMarketingEmail($subjectMock, $bodyMock, $senderMock, $bccMock, $attachmentMock);
    }
}
