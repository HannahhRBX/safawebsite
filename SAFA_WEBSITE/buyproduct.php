<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Somerset Artisan Food Association  - Order</title>

    <style>
        .totalCost {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <a class="text-decoration-none text-dark" href="index.php">
            <h1 class="display-1 text-center mb-5">Somerset Artisan Food Association  - Order Page!</h1>
        </a>

        <?php

        $productid = $_GET['productid'];
        $quantity = $_GET['quantity'];
        $customerid = $_GET['customerid'];

        $sql = "SELECT ProductID, ProductName, Cost, ImageURL FROM products WHERE ProductID = '" . $productid . "'";

        $conn = mysqli_connect("localhost", "root", "", "cheeseshop");

        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        $productname = $row['ProductName'];
        $imageurl = $row['ImageURL'];
        $cost = $row['Cost'];
        $sale = $row['Cost'] * $quantity;
        ?>

        <div class="card">
            <div class="card-header">
                Confirm Cheese Order!
            </div>

            <div class="card-body">
                <h5 class="card-title"><?php echo $productname ?></h5>
                <img width=200px height=200px src='<?php echo $imageurl ?>' />
                <p class="card-text"><?php echo $productname ?> - Quantity: <?php echo $quantity ?></p>
                <p class="card-text"><?php echo $productname ?> - Individual Item Cost: £<?php echo $cost ?></p>
                <p class="card-text totalCost">Total Cost: £<?php echo number_format((float)$sale, 2, '.', '') ?></p>
            </div>

            <div class="card-footer">
                <form method="GET" action="confirmorder.php">
                    <input type='hidden' name='customerid' value="<?php //$_SESSION['customerid'] 
                                                                    ?>1" />
                    <input type='hidden' name='productid' value="<?php echo $productid; ?>" />
                    <input type='hidden' name='quantity' value="<?php echo $quantity; ?>" />
                    <input type='hidden' name='orderdate' value="<?php echo date('Y-m-d H:i:s'); ?>" />
                    <input type="submit" class="btn btn-primary" value="Confirm Order" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>