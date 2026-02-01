<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Application\Action;

use Creational\Builder\Conceptual\Module\Product\Application\Builder\Director\ProductDirector;
use Creational\Builder\Conceptual\Module\Product\Application\Map\ComponentMapper;
use Creational\Builder\Conceptual\Module\Product\Domain\Entity\Enum\ProductType;
use Creational\Builder\Conceptual\Module\Product\Domain\Interface\Product;

class ProcessOrderAction
{
    public function __construct(private ProductDirector $productDirector, private ComponentMapper $componentMapper)
    {
    }

    /**
     * @param array{
     *     int?: array{
     *         "type": string,
     *         "components"?: array<string, string>
     *     }
     * } $lineItems
     * @return array<string>
     */
    public function __invoke(array $lineItems = []): array
    {
        $productsForOrder = [];
        foreach ($lineItems as $item) {
            $type = ProductType::from($item['type']);
            $builder = $type->getBuilder();
            $components = match (true) {
                count($item['components']) > 0 => $this->componentMapper->stringsToObjects($item['components']),
                default => $type->getStandardComponents()
            };
            $this->productDirector->buildProduct($builder, $components);
            $productsForOrder[] = $builder->getProduct();
        }

        return array_map(fn(Product $product) => $product->getSpecification(), $productsForOrder);
    }
}
