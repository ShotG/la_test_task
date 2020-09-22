<?php

namespace src\Entity;

class BaseRequest
{
    /** @var string */
    protected $productName;

    /** @var array */
    protected $productOptions = [];

    public function __construct($productName, $productOptions) {
        $this->productName = $productName;
        $this->productOptions = $productOptions;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @return array
     */
    public function getProductOptions(): array
    {
        return $this->productOptions;
    }
}
