<?php

namespace Creational\Prototype\Practical\Application\Concrete\Render;

use Creational\Prototype\Practical\Application\Interface\Render;

class RenderWebUi implements Render
{
    public function output(array $arguments): string
    {
        return var_export($arguments, true);
    }
}
