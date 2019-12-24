<?php
include_once "Class/DBConnect.php";
include_once "Class/manager.php";
include_once "Class/classManager.php";

$manager = new classManager();
$student = $manager->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php include "navbar/navbar.php" ?>
                <table border="1" style="width: 100%;text-align: center">
                    <tr>
                        <td><h3 style="color: #0e2231">STT</h3></td>
                        <td><h3 style="color: #0d8ccc">OrderNumber</h3></td>
                        <td><h3 style="color:#cf8aff;">OrderDate</h3></td>
                        <td><h3 style="color:#ff8401;">OrderShipperDate</h3></td>
                        <td><h3 style="color:#04ccb4;">Status</h3></td>
                        <td><h3 style="color: #c0ff15">PriceEach</h3></td>
                    </tr>
                    <?php foreach ($student as $key => $value): ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><a style="color: red" href="OrderDetails.php?id=<?php echo $value->orderNumber ?>"</a><?php echo $value->orderNumber ?></td>
                            <td><?php echo $value->orderDate ?></td>
                            <td><?php echo $value->shippedDate ?></td>
                            <td><?php echo $value->status ?></td>
                            <td><?php echo $value->priceEach ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</form>
</body>
</html>
