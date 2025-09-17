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

#[CoversClass(BaseSize::class)]
#[UsesClass(BaseStyle::class)]
class BaseSizeTest extends TestCase
{
    public function testSmallAndThinReturnCorrectClass(): void
    {
        $sut = BaseSize::SMALL;

        $result = $sut->getBaseFromStyle(BaseStyle::THIN_CRUST);

        $this->assertInstanceOf(ThinCrustSmallBase::class, $result);
    }

    public function testSmallAndDeepReturnCorrectClass(): void
    {
        $sut = BaseSize::SMALL;

        $result = $sut->getBaseFromStyle(BaseStyle::DEEP_DISH);

        $this->assertInstanceOf(DeepDishSmallBase::class, $result);
    }

    public function testMediumAndThinReturnCorrectClass(): void
    {
        $sut = BaseSize::MEDIUM;

        $result = $sut->getBaseFromStyle(BaseStyle::THIN_CRUST);

        $this->assertInstanceOf(ThinCrustMediumBase::class, $result);
    }

    public function testMediumAndDeepReturnCorrectClass(): void
    {
        $sut = BaseSize::MEDIUM;

        $result = $sut->getBaseFromStyle(BaseStyle::DEEP_DISH);

        $this->assertInstanceOf(DeepDishMediumBase::class, $result);
    }

    public function testLargeAndThinReturnCorrectClass(): void
    {
        $sut = BaseSize::LARGE;

        $result = $sut->getBaseFromStyle(BaseStyle::THIN_CRUST);

        $this->assertInstanceOf(ThinCrustLargeBase::class, $result);
    }

    public function testLargeAndDeepThrowsException(): void
    {
        $sut = BaseSize::LARGE;

        $this->expectException(\RuntimeException::class);
        $sut->getBaseFromStyle(BaseStyle::DEEP_DISH);
    }
}
