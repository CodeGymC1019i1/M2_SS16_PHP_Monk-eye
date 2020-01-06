<?php
include_once "db/DBConnect.php";

$db = new DBConnect();
$listStore = $db->getListStore();
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
</head>
<body>
<div class="container">
    <button type="button" class="btn btn-primary mb-2 mt-2" onclick="window.location.href ='page/CreateNewStore.php';">
        Add New Store
    </button>
    <button type="button" class="btn btn-primary mb-2 mt-2" onclick="window.location.href ='page/ListProduct.php';">List
        Products
    </button>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">StoreName</th>
            <th></th>
        </tr>
        </thead>
        <?php foreach ($listStore as $item) : ?>
            <tr>
                <td> <?php echo $item["store_id"] ?></td>
                <td>
                    <a href="page/menu.php?store_name=<?php echo $item["store_name"] ?>"><?php echo $item["store_name"] ?></a>
                </td>
                <td>
                    <button type="button" class="btn btn-primary mb-2 mt-2"
                            onclick="window.location.href ='page/DeleteStore.php?store_id=<?php echo $item["store_id"] ?>'; return confirm('bạn có chắc chắn muốn xóa store này không?')" >
                        Delete Store
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
