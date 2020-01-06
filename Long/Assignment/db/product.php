<?php


class product
{
    public $productName;
    public $price;
    public $topping;
    public function __construct($productName,$price,$topping)
    {
        $this->productName = $productName;
        $this->price = $price;
        $this->topping = $topping;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getTopping()
    {
        return $this->topping;
    }
}