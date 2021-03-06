<?php
include_once "../db/DBConnect.php";

$db = new DBConnect();
$listProduct = $db->getListProduct();
If ($_SERVER["REQUEST_METHOD"] == "POST") {
    $store_name = $_POST["store_name"];
    if (isset($_POST['product'])) {
        $listCheck = $_POST['product'];
    }
    $db->addStore($store_name, $listCheck);
    header("Location: ../index.php");
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
</head>
<body>
<div class="container mt-5 mb-3">
    <form method="post">
        <div class="form-group">
            <label>Store Name</label>
            <input type="text" class="form-control" name="store_name">
        </div>
        <div class="form-group form-check">
            <?php foreach ($listProduct as $item) : ?>
                <input type="checkbox" class="form-check-input" name="product[]"
                       value="<?php echo $item["product_id"] ?>">
                <label class="form-check-label"><?php echo $item["product_name"]; ?></label><br>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
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
