<?php

namespace src\Entity\Ingredient;

use src\Entity\BaseIngredient;

class Water extends BaseIngredient
{
    public function getName(): string
    {
        return self::NAME_WATER;
    }
}
