<?php

declare(strict_types=1);

namespace Creational\Prototype\Conceptual\Module\Product\Application;

use Creational\Prototype\Conceptual\Infrastructure\Log\Logger;
use Creational\Prototype\Conceptual\Module\Product\Domain\Product;
use Creational\Prototype\Conceptual\Module\Product\Domain\ProductCategory;

class DefaultCloneAction
{
    public function __construct(private readonly Logger $logger)
    {
    }

    public function __invoke(): void
    {
        $electronicsCategory = new ProductCategory('Electronics', 'Technology');
        $originalProduct = new Product(
            name: 'Laptop - Base Model',
            price: 1000,
            category: $electronicsCategory,
            features: ['16GB RAM', 'SSD Storage']
        );

        $this->logger->log($originalProduct->getInfo());

        $premiumProduct = $originalProduct->clone();
        $premiumProduct->rename('Laptop - Premium Model');
        $premiumProduct->changePrice(2000);
        $premiumProduct->addFeature('Dedicated GPU');
        $premiumProduct->addFeature('RGB Keyboard');

        $this->logger->log($premiumProduct->getInfo());

        $this->logger->log($originalProduct->getCategory()->getName());
        $this->logger->log($premiumProduct->getCategory()->getName());

        $premiumProduct->changeCategory(
            new ProductCategory('Premium Electronics', 'Technology')
        );

        $this->logger->log($originalProduct->getCategory()->getName());
        $this->logger->log($premiumProduct->getCategory()->getName());
    }
}
