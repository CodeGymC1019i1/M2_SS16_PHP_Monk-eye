<?php

class DBConnect
{
    public $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=Assignment", "root", "long1996");
    }

    public function getListStore()
    {
        $sql = "SELECT store_name,store_id FROM stores";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getMenuStore($store)
    {
        $sql = "SELECT p.product_name,p.price,p.toppings,s.store_id from products p JOIN menuStore m ON m.product_id = p.product_id JOIN stores s ON s.store_id = m.store_id WHERE s.store_name = '$store'";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getIdStore($store)
    {
        $sql = "SELECT store_id from stores where store_name='$store'";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getListProduct()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function addStore($name, $checkList)
    {
        $sql = "INSERT INTO stores(store_name) VALUES('$name')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $id = $this->getIdStore($name);
        $idValue = $id[0][0];
        foreach ($checkList as $value) {
            $sql2 = "INSERT INTO menuStore(store_id,product_id) VALUES('$idValue','$value')";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->execute();
        }
    }

    public function addProduct($name, $price, $topping)
    {
        $sql = "INSERT INTO products(product_name,price,toppings) VALUES('$name','$price','$topping')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function deleteProduct($list)
    {
        foreach ($list as $value) {
            $sql = "DELETE FROM menuStore WHERE product_id = '$value'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $sql2 = "DELETE FROM products WHERE product_id = '$value'";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->execute();
        }
    }

    public function deleteStore($storeId)
    {
        $sql = "DELETE FROM menuStore WHERE store_id ='$storeId'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql2 = "DELETE FROM stores WHERE store_id = '$storeId'";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->execute();
    }
    public function editProduct($productId,$name,$price,$toppings){
        $sql = "UPDATE products SET product_name = '$name', price = '$price' , toppings = '$toppings' WHERE product_id ='$productId'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

}
}