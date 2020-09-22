<?php

namespace src\Entity;

abstract class BaseProduct
{
    const NAME_PANCAKE = 'pancake';
    const NAME_AMERICANO = 'americano';

    /** @var array */
    protected $ingredients = [];

    public function __construct(array $optionalIngredients)
    {
        foreach ($this->getReceiptIngredients() as $ingredientName => $className) {
            $this->ingredients[$ingredientName] = new $className;
        }

        foreach ($optionalIngredients as $ingredientName => $className) {
            if (!isset($this->getOptionalIngredients()[$ingredientName])) {
                throw new \Exception('"' . $ingredientName . '" - incorrect optional ingredient');
            }

            $this->ingredients[$ingredientName] = new $className;
        }
    }

    /**
     * @return string
     */
    abstract public function getName(): string;

    /**
     * @return array
     */
    abstract public function getReceiptIngredients(): array;

    /**
     * @return array
     */
    abstract public function getOptionalIngredients(): array;

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        if (count($this->ingredients) < count($this->getReceiptIngredients()) ||
            count($this->ingredients) > count($this->getReceiptIngredients()) + count($this->getOptionalIngredients())) {
            return false;
        }

        $allIngredients = array_merge($this->getReceiptIngredients(), $this->getOptionalIngredients());

        foreach ($this->ingredients as $ingredientName => $ingredient) {
            if (!isset($allIngredients[$ingredientName]) ||
                get_class($ingredient) !== $allIngredients[$ingredientName]) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }
}
