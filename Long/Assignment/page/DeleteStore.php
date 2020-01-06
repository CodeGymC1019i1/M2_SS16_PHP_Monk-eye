<?php
include_once "../db/DBConnect.php";

$db = new DBConnect();
$store_id = $_GET["store_id"];
$db->deleteStore($store_id);
header("Location: ../index.php");

?>