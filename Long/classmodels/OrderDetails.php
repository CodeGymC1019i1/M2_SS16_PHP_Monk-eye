<?php
include_once "Class/DBConnect.php";
include_once "Class/manager.php";
include_once "Class/classManager.php";
$id = $_GET['id'];
$classManager = new classManager();
$managerMyId = $classManager->informationCustomers($id);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["status"])) {
        $new_status = $_POST["status"];
//    var_dump($new_status);
//    die();
        $classManager->updateStatus($id, $new_status);
        header("Location:OrderDetails.php?id=$id");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php include "navbar/navbar.php" ?>
            <ur>
                <li style="margin-top: 30px"><a href="index.php" class="btn btn-outline-info col-sm-">COME BACK</a></li>
            </ur>
            <h1 style="color: deeppink">Thông tin khách hàng</h1>
            <table class="table table-bordered col-12" style="text-align: center">
                <thead>
                <tr>
                    <th scope="col">CustomersName</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">CustomersNumber</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $managerMyId->customerName ?></td>
                    <td><?php echo $managerMyId->phone ?></td>
                    <td><?php echo $managerMyId->city ?></td>
                    <td><?php echo $managerMyId->customerNumber ?></td>
                </tr>
                </tbody>
            </table>
            <h4 class="col-12">Trạng thái : </h4>
            <form action="" method="post">
                <select name="status" class="col-2" style="text-align: center">
                    <option value="Shipper" <?php if ($managerMyId->status == Status::SHIPPED): ?> selected <?php endif; ?>>
                        Shipped
                    </option>
            
                    <option value="Cancelled" <?php if ($managerMyId->status == Status::CANCELLED): ?> selected<?php endif; ?>>
                        Cancelled
                    </option>
            
                    <option value="In Process" <?php if ($managerMyId->status == Status::IN_PROCESS): ?> selected<?php endif; ?>>
                        In Process
                    </option>
            
                    <option value="On Hold" <?php if ($managerMyId->status == Status::ON_HOLD): ?> selected<?php endif; ?>>
                        On Hold
                    </option>
            
                    <option value="Resolved" <?php if ($managerMyId->status == Status::RESOLVED): ?> selected<?php endif; ?>>
                        Resolved
                    </option>
            
                    <option value="Disputed" <?php if ($managerMyId->status == Status:: DISPUTED): ?> selected<?php endif; ?>>
                        Disputed
                    </option>
                </select>
                <input type="submit" class="btn btn-outline-success" value="UPDATE"
                       onclick="return confirm('bạn muốn sửa không ?')">
            </form>
        </div>
    </div>
</div>
</body>
</html>







