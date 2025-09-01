<?php

declare(strict_types=1);

namespace Creational\Singleton\Conceptual\Application;

use Creational\Singleton\Conceptual\Infrastructure\Configuration\Configuration;

class AdminPanelStoreAction
{
    public function __invoke(array $arguments): void
    {
        $configuration = Configuration::getInstance();
        $configuration->set('theme', $arguments['theme']); // Retrieved in DashboardShowAction
    }
}
