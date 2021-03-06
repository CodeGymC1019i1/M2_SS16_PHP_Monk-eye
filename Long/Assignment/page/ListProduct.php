<?php
include_once "../db/DBConnect.php";

$db = new DBConnect();
$listProduct = $db->getListProduct();
If ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product'])) {
        $listCheck = $_POST['product'];
//        var_dump($listCheck);
//        die();
        $db->deleteProduct($listCheck);
    }
    header("Location: ListProduct.php");
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
    <button type="button" class="btn btn-primary mb-2 mt-2" onclick="window.location.href ='CreateNewProduct.php';">Add
        New Product
    </button>
    <form method="post">
        <table class="table" style="text-align: center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Toppings</th>
                <th></th>
                <th></th>
            </tr>
            </thead >
            <?php foreach ($listProduct as $item) : ?>
                <tr>
                    <td > <?php echo $item["product_name"] ?></td>
                    <td> <?php echo $item["price"] ?></td>
                    <td> <?php echo $item["toppings"] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary mb-2 mt-2"
                                onclick="window.location.href ='EditProduct.php?product_id=<?php echo $item["product_id"] ?>&product_name=<?php echo $item["product_name"] ?>&price=<?php echo $item["price"] ?>&toppings=<?php echo $item["toppings"] ?>';">
                            Edit
                        </button>
                    </td>
                    <Td><input type="checkbox" class="form-check-input" name="product[]"
                               value="<?php echo $item["product_id"] ?>" style="zoom: 200%">
                        <label class="form-check-label" ><?php echo $item["product_name"]; ?></label><br></Td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit" class="btn btn-primary mb-3">Delete</button>
    </form>
    <hr>
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
