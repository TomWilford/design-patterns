<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Application\Action;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Domain\Os\Os;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Resolver\UiFactoryResolver;
use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Render\RenderUi;

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
