<?php

namespace src\Manufacture\Bakery;

use src\Entity\BaseRequest;
use src\Manufacture\ManufactureInterface;

class Bakery implements ManufactureInterface
{
    public function produce(BaseRequest $request)
    {
        if (defined('src\Entity\BaseProduct::NAME_' . strtoupper($request->getProductName()))) {
            $productClassName = "src\\Entity\\Product\\" .
                ucfirst(constant('src\Entity\BaseProduct::NAME_'. strtoupper($request->getProductName())));
        } else {
            throw new \Exception('invalid product name');
        }

        $productOptionalIngredients = [];

        foreach ($request->getProductOptions() as $option) {
            if (defined('src\Entity\BaseIngredient::NAME_' . strtoupper($option))) {
                $ingredientName = constant('src\Entity\BaseIngredient::NAME_'. strtoupper($option));
            } else {
                throw new \Exception('"' . $option . '" - invalid ingredient');
            }
            $ingredientClassName = "src\\Entity\\Ingredient\\" . ucfirst($ingredientName);
            $productOptionalIngredients[$ingredientName] = $ingredientClassName;
        }

        return new $productClassName($productOptionalIngredients);
    }
}
