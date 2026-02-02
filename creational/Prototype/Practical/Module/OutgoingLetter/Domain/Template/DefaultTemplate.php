<?php

declare(strict_types=1);

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Template;

enum DefaultTemplate
{
    case CONTRACT;
    case NDA;
    case EMPLOYMENT_AGREEMENT;
}
