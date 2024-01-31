<?php 
require 'inputProcessor.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Somerset Artisan Food Association  - Adding New Product...</title>

<body>
    <div class="container">
    <a class="text-decoration-none text-dark" href="index.php">
        <h1 class="display-1 text-center mb-5">Adding New Product..!</h1>
    </a>

        <?php
        $ProductArray = array();
        $ProductArray["productname"] = InputProcessor::process_alphanumeric_string("Product Name",$_GET["productname"],5,80,true);
        $ProductArray["productcost"] = InputProcessor::process_number("Product Cost",$_GET["productcost"],1,15);
        $ProductArray["producturl"] = InputProcessor::process_url($_GET['producturl'],5,200);

        $valid = true;
        foreach ($ProductArray as $Detail){
            if ($Detail["valid"] === false){
                $valid = false;
                header("Location: newproduct.php?err=".$Detail["text"]);
                exit;
            }
        }
        $productname = $ProductArray["productname"]["text"];
        $productcost = $ProductArray["productcost"]["text"];
        $producturl = $ProductArray["producturl"]["text"];

        $conn = mysqli_connect("localhost", "root", "", "cheeseshop");

        $sql = "INSERT INTO products(ProductName, Cost, ImageURL) VALUES ('" .  $productname . "', " . $productcost . ", '" . $producturl . "')";

        mysqli_query($conn, $sql);

        header("Location: index.php");
        die();
        ?>

    </div>
</body>

</html>