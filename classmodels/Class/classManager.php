<?php
include_once "Customers.php";
include_once "Status.php";
class classManager implements Status
{
    public $connect;
    
    public function __construct()
    {
        $data = new DBConnect("mysql:host=127.0.0.1;dbname=classicmodels", "root", "1037212a");
        $this->connect = $data->connect();
    }
    
    public function getAll()
    {
        $sql = "SELECT o.orderNumber,o.orderDate,o.shippedDate,o.status,SUM(od.priceEach) AS priceEach
                FROM orders o
                JOIN orderdetails od
                ON o.orderNumber=od.orderNumber
                GROUP BY o.orderNumber ";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $manager = [];
        
        foreach ($result as $value) {
            $managers = new manager($value['orderNumber'], $value['orderDate'], $value['shippedDate'], $value['status'], $value['priceEach']);
            array_push($manager, $managers);
        }
        return $manager;
    }
    
    public function informationCustomers($id)
    {
        $sql = "SELECT c.customerName,c.phone,c.city,c.customerNumber,o.status AS 'Status'
                FROM customers c
                INNER JOIN orders o
                ON c.customerNumber = o.customerNumber
                WHERE o.orderNumber=$id ";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetch();
        $customers = new Customers($result['customerName'],$result['phone'],$result['city'],$result['customerNumber'],$result['Status']);
        return $customers;
    }
    
    public function updateStatus($id, $status)
    {
        $sql = "UPDATE orders SET status=:status WHERE orderNumber=:id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}