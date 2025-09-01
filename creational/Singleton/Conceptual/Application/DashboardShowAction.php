<?php

declare(strict_types=1);

namespace Creational\Singleton\Conceptual\Application;

use Creational\Singleton\Conceptual\Infrastructure\Configuration\Configuration;

class DashboardShowAction
{
    public function __invoke(): array
    {
        $configuration = Configuration::getInstance();

        return [
            'theme' => $configuration->get('theme'), // Set in AdminPanelStoreAction
        ];
    }
}
