<?php

declare(strict_types=1);

namespace Creational\Singleton\Conceptual\Application;

use Creational\Singleton\Conceptual\Infrastructure\Configuration\Configuration;

class DashboardShowAction
{
    /**
     * @return array{
     *     "theme": mixed
     * }
     */
    public function __invoke(): array
    {
        $configuration = Configuration::getInstance();

        return [
            'theme' => $configuration->get('theme'), // Set in AdminPanelStoreAction
        ];
    }
}
