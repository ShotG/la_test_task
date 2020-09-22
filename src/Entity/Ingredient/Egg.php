<?php

namespace src\Entity\Ingredient;

use src\Entity\BaseIngredient;

class Egg extends BaseIngredient
{
    public function getName(): string
    {
        return self::NAME_EGG;
    }
}
