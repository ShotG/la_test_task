<?php

namespace src\Entity;

abstract class BaseIngredient
{
    const NAME_EGG = 'egg';
    const NAME_MILK = 'milk';
    const NAME_WATER = 'water';
    const NAME_FLOUR = 'floor';
    const NAME_SUGAR = 'sugar';
    const NAME_COFFEE = 'coffee';

    /**
     * @return string
     */
    abstract public function getName(): string;
}
