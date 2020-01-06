<?php


class Store
{
public $storeName;
public function __construct($storeName)
{
    $this->storeName = $storeName;
}

    /**
     * @return mixed
     */
    public function getStoreName()
    {
        return $this->storeName;
    }
}