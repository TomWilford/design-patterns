<?php

declare(strict_types=1);

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Render;

use creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\UserInterface\Domain\Factory\Interface\UiFactory;

readonly class RenderUi
{

    public function __construct(private UiFactory $uiFactory)
    {
    }

    public function render(): string
    {
        $button = $this->uiFactory->createButton();
        $checkbox = $this->uiFactory->createCheckbox();

        return $button->render() . PHP_EOL . $checkbox->render();
    }
}
