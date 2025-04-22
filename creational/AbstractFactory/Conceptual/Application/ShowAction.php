<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Application;

use Creational\AbstractFactory\Conceptual\Domain\Enum\Os;
use Creational\AbstractFactory\Conceptual\Domain\Utility\RenderUi;
use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Factory\Resolver\UiFactoryResolver;

readonly class ShowAction
{
    public function __construct(private UiFactoryResolver $resolver)
    {
    }

    public function __invoke($request): string
    {
        $operatingSystem = Os::tryFrom($request['operatingSystem']);
        $uiFactory = $this->resolver->resolve($operatingSystem);
        $renderUi = new RenderUi($uiFactory);
        return $renderUi->render();
    }
}
