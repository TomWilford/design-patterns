<?php

declare(strict_types=1);

namespace Creational\Prototype\Conceptual\Module\Product\Application;

use Creational\Prototype\Conceptual\Infrastructure\Log\Logger;
use Creational\Prototype\Conceptual\Module\Product\Infrastructure\ProductPrototypeRegistry;

class RegistryCloneAction
{
    public function __construct(private readonly Logger $logger, private ProductPrototypeRegistry $registry)
    {
    }

    public function __invoke(): void
    {
        $products[] = $basic = $this->registry->createFromPrototype('basic');
        $products[] = $premium = $this->registry->createFromPrototype('premium');

        $basicBundle = $basic->clone();
        $basicBundle->changePrice(1999);
        $basicBundle->addFeature('With 22" Monitor');
        $products[] = $basicBundle;

        $premiumBundle = $premium->clone();
        $premiumBundle->changePrice(2999);
        $premiumBundle->addFeature('With 22" Monitor');
        $products[] = $premiumBundle;

        foreach ($products as $product) {
            $this->logger->log($product->getInfo());
        }
    }
}
