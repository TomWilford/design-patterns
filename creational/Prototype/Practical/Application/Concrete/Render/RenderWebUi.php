<?php

declare(strict_types=1);

namespace Creational\Prototype\Practical\Application\Concrete\Render;

use Creational\Prototype\Practical\Application\Interface\Render;

class RenderWebUi implements Render
{
    /**
     * @param array<string, mixed> $arguments
     */
    public function output(array $arguments): string
    {
        return var_export($arguments, true);
    }
}
