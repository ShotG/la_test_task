<?php

namespace src\Entity\Ingredient;

use src\Entity\BaseIngredient;

class Milk extends BaseIngredient
{
    public function getName(): string
    {
        return self::NAME_MILK;
    }
}
