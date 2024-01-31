<!DOCTYPE html>
<html>
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
      <title>Somerset Artisan Food Association </title>

        <style>
            .row{
              border-bottom: 2px solid #0d6efd;
            }

            .card{
              min-width: 180px !important;
              display: inline-block;
            }
        </style>
    </head>

    <body>
      <div class="container">
        <a class="text-decoration-none text-dark" href="index.php">
            <h1 class="display-1 text-center mb-5">Somerset Artisan Food Association </h1>
        </a>
        <h2 class="display-4 text-center mb-5">Admin Order Page - Oldest Orders First</h2>

        <?php
          $conn = mysqli_connect("localhost", "root", "", "cheeseshop");

          $sql = "SELECT OrderID, OrderDate, UserID FROM orders ORDER BY OrderDate DESC";
          $result = mysqli_query($conn, $sql);
        
          $MAX_COLUMNS = 3;
          $ordercount = 0;
          $columns = 0;

          while($row = mysqli_fetch_assoc($result)) {
            $OrderID = $row["OrderID"];
            $OrderDate = $row["OrderDate"];
            $UserID = $row["UserID"];

            $usersql = "SELECT * FROM users WHERE UserID=" . $UserID;
            $userresults = mysqli_query($conn, $usersql);
            $userrow = mysqli_fetch_assoc($userresults);

            $Username = $userrow['Username'];
            $Email = $userrow['Email'];
            $PostalAddress = $userrow['Address'];

            if ($ordercount % 4 == 0 || $ordercount == 0){
                echo '<div class="row mb-3">';
            }

            echo '<div class="card-columns col-3 mb-3">';
            echo '<div class="card">';

            echo '<h5 class="card-header">Order ID: ' . $OrderID . "<br/>" .
            "Order Date: " . $OrderDate . '</h5>';

            echo '<h5 class="card-header">
            Username: ' . $Username . '<br/>' . 
            'Email Address: ' . $Email . '<br/>' .
            'Postal Address: ' . $PostalAddress . '<br/>' .  
            '</h5>';
            echo '<div class="card-body">';
            
            $sql = "SELECT ProductID, OrderID, Quantity FROM product_orders WHERE OrderID=" . $OrderID;
            $ordersresults = mysqli_query($conn, $sql);

            echo '<ul class="list-group list-group-flush">';

            while($orderrow = mysqli_fetch_assoc($ordersresults)) {
                echo '<li class="list-group-item">';

                $ProductID = $orderrow["ProductID"];
                $Quantity = $orderrow["Quantity"];

                $sql = "SELECT ProductID, ProductName, Cost, ImageURL FROM products WHERE ProductID=" . $ProductID;
                $productresult = mysqli_query($conn, $sql);
                $productrow = mysqli_fetch_assoc($productresult);

                $ProductName = $productrow["ProductName"];
                $ProductCost = $productrow["Cost"];
                $ImageURL = $productrow["ImageURL"];

                echo "<img width=100px height=100px src ='" . $ImageURL . "'/>";
                echo "<p>Product Name: " . $ProductName . "</p>";
                echo "<p>Product Cost: £" . $ProductCost . "</p>";
                echo "<p>Quantity: " . $Quantity . "</p>";
                echo "<p>Total Cost: £" . ($Quantity * $ProductCost) . "</p>";

                echo "</li>";
            }
            
            echo "</ul>";
            echo "</div>";
            echo "<div class='card-footer'>";
            echo "<a href='mailto:" . $Email . "'><p class='text-center m-0'> Contact Customer </p></a></div></div></div>";

            if ($columns == $MAX_COLUMNS){
                echo '</div>';

                $columns = -1;
            }

            $ordercount += 1;
            $columns += 1;
          }
        ?>
      </div>

    </body>
</html>