<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Practical\Application\Action;

use Creational\AbstractFactory\Practical\Domain\Os\Os;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Resolver\UiFactoryResolver;
use Creational\AbstractFactory\Practical\Module\UserInterface\Domain\Render\RenderUi;

readonly class ShowAction
{
    public function __construct(private UiFactoryResolver $resolver)
    {
    }

    /**
     * @param array{
     *     "operatingSystem": string
     * } $request
     * @return string
     */
    public function __invoke(array $request): string
    {
        $operatingSystem = Os::tryFrom($request['operatingSystem']);
        $uiFactory = $this->resolver->resolve($operatingSystem);
        $renderUi = new RenderUi($uiFactory);
        return $renderUi->render();
    }
}
