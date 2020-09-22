<?php

namespace src\Entity\Ingredient;

use src\Entity\BaseIngredient;

class Sugar extends BaseIngredient
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME_SUGAR;
    }
}
