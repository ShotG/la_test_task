<?php

namespace src\Entity\Ingredient;

use src\Entity\BaseIngredient;

class Coffee extends BaseIngredient
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME_COFFEE;
    }
}
