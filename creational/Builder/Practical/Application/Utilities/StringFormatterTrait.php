<?php

declare(strict_types=1);

namespace Creational\Builder\Practical\Application\Utilities;

use Symfony\Component\Emoji\EmojiTransliterator;

trait StringFormatterTrait
{
    public function stringToPlainText(string $string): string
    {
        $transliterator = EmojiTransliterator::create('strip');
        $transliterator->transliterate($string);
        return strip_tags($string);
    }

    public function truncateString(string $string, int $length = 30): string
    {
        return substr($string, 0, $length);
    }

    public function ellipsisString(string $string, int $length = 30): string
    {
        return $this->truncateString($string, $length) . '...';
    }
}
