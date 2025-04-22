<?php

declare(strict_types=1);

namespace Creational\AbstractFactory\Conceptual\Domain\Utility;

use Creational\AbstractFactory\Conceptual\Module\UserInterface\Domain\Factory\Interface\UiFactory;

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
