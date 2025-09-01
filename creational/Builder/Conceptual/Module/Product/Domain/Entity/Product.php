<?php

declare(strict_types=1);

namespace Creational\Builder\Conceptual\Module\Product\Domain\Entity;

class Product
{
    private string $name;
    private string $description;
    private int $price;
    private int $quantity = 0;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function output(): string
    {
        return sprintf(
            <<<HTML
            Product:
             - Name: %s
             - Description: %s
             - Price: %s
             - Quantity: %s   
            HTML,
            $this->name,
            $this->description,
            $this->price,
            $this->quantity
        );
    }
}
