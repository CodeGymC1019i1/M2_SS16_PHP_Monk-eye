<?php



class Customers
{
    public $customerName;
    public $phone;
    public $city;
    public $customerNumber;
    public $status;
    
    public function __construct($customerName,$phone,$city,$customerNumber,$status)
    {
        $this->customerName = $customerName;
        $this->phone = $phone;
        $this->city = $city;
        $this->customerNumber = $customerNumber;
        $this->status = $status;
    }
}