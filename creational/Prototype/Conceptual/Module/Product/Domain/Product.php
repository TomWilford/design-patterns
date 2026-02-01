<?php

namespace Creational\Prototype\Conceptual\Module\Product\Domain;

use Creational\Prototype\Conceptual\Application\Interface\Prototype;

class Product implements Prototype
{
    /**
     * @param array<string> $features
     */
    public function __construct(
        public string $name,
        public int $price,
        public ProductCategory $category,
        public array $features = []
    ) {
    }

    public function clone(): self
    {
        return clone($this, [
            "category" => clone $this->getCategory(),
        ]);
    }

    public function getInfo(): string
    {
        return sprintf(
            "Product: %s | Price: %s | Category: %s | Features: %s",
            $this->getName(),
            $this->getPrice(),
            $this->getCategory()->getName(),
            implode(", ", $this->getFeatures())
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getCategory(): ProductCategory
    {
        return $this->category;
    }

    /**
     * @return array<string>
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    public function rename(string $name): void
    {
        $this->name = $name;
    }

    public function changePrice(int $price): void
    {
        $this->price = $price;
    }

    public function changeCategory(ProductCategory $category): void
    {
        $this->category = $category;
    }

    public function addFeature(string $features): void
    {
        $this->features[] = $features;
    }
}
