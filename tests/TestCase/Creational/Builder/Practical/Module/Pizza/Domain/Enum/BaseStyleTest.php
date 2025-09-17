<?php

declare(strict_types=1);

namespace TestCase\Creational\Builder\Practical\Module\Pizza\Domain\Enum;

use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\DeepDishMediumBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\DeepDishSmallBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\ThinCrustLargeBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\ThinCrustMediumBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Entity\Base\ThinCrustSmallBase;
use Creational\Builder\Practical\Module\Pizza\Domain\Enum\BaseSize;
use Creational\Builder\Practical\Module\Pizza\Domain\Enum\BaseStyle;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BaseStyle::class)]
#[UsesClass(BaseSize::class)]
class BaseStyleTest extends TestCase
{
    public function testSmallAndThinReturnCorrectClass(): void
    {
        $sut = BaseStyle::THIN_CRUST;

        $result = $sut->getBaseFromSize(BaseSize::SMALL);

        $this->assertInstanceOf(ThinCrustSmallBase::class, $result);
    }

    public function testSmallAndDeepReturnCorrectClass(): void
    {
        $sut = BaseStyle::DEEP_DISH;

        $result = $sut->getBaseFromSize(BaseSize::SMALL);

        $this->assertInstanceOf(DeepDishSmallBase::class, $result);
    }

    public function testMediumAndThinReturnCorrectClass(): void
    {
        $sut = BaseStyle::THIN_CRUST;

        $result = $sut->getBaseFromSize(BaseSize::MEDIUM);

        $this->assertInstanceOf(ThinCrustMediumBase::class, $result);
    }

    public function testMediumAndDeepReturnCorrectClass(): void
    {
        $sut = BaseStyle::DEEP_DISH;

        $result = $sut->getBaseFromSize(BaseSize::MEDIUM);

        $this->assertInstanceOf(DeepDishMediumBase::class, $result);
    }

    public function testLargeAndThinReturnCorrectClass(): void
    {
        $sut = BaseStyle::THIN_CRUST;

        $result = $sut->getBaseFromSize(BaseSize::LARGE);

        $this->assertInstanceOf(ThinCrustLargeBase::class, $result);
    }

    public function testLargeAndDeepThrowsException(): void
    {
        $sut = BaseStyle::DEEP_DISH;

        $this->expectException(\RuntimeException::class);
        $sut->getBaseFromSize(BaseSize::LARGE);
    }
}
