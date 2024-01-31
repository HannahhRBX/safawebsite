<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
      <title>Somerset Artisan Food Association </title>

        <style>
            .newItem{
              display: inline-block;   
              height: 420px;
              min-width: 250px;
              min-height: 420px;
              padding: 10px;
              border-bottom: 2px solid #0d6efd;
            }

            .button{
              margin-top: 10px;
              width: 100%;
            }
        </style>
    </head>

    <body>
      <div class="container">
        <?php
          if(isset($_SESSION["username"])){
            $username = $_SESSION["username"];
            echo "<h1 class='display-1 text-center mb-5'>Somerset Artisan Food Association  - Welcome $username!</h1>";
            echo "<div class='row text-center'>";
            echo "<div class='col-6'><a href='logout.php'><h2>Logout!</h2></a></div>";
            echo "<div class='col-6'><a href='logout.php'><h2>Logout!</h2></a></div>";
            echo "</div>";
          } else {
            echo "<h1 class='display-1 text-center mb-5'>Somerset Artisan Food Association !</h1>";
            echo "<div class='row text-center'>";
            echo "<div class='col-6'><a href='register.php'><h2>Register!</h2></a></div>";
            echo "<div class='col-6'><a href='login.php'><h2>Login!</h2></a></div>";
            echo "</div>";
          }
        ?>

        <?php
          $conn = mysqli_connect("localhost", "root", "", "cheeseshop");

          $sql = "SELECT ProductID, ProductName, Cost, ImageURL FROM products";
          $result = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_assoc($result)) {
            $ProductID = $row["ProductID"];
            $ProductName = $row["ProductName"];
            $Cost = $row["Cost"];
            $ImageURL = $row["ImageURL"];

            echo "<div class='newItem col-3' title='" . $ProductID . "'>";

            echo "<form method='GET' action='buyproduct.php'>";

            echo "<img width=100% height=200px src='" . $ImageURL . "'/>";
            echo "<h2>" . $ProductName . "</h2>";
            echo "<h3>£" . $Cost . "</h3>";

            echo "<input type='hidden' name='productid' value='" . $ProductID . "'>";

            //echo "<input type='hidden' name='customerid' value='" . $_SESSION['userID'] . "'>";
            echo "<input type='hidden' name='customerid' value='" . 1 . "'>";

            echo "<label style='margin-right: 5px;' for='quantity'>Quantity (1-10):</label>";
            echo "<input type='number' class='form-control' name='quantity' min='1' max='10' value='1'>";

            echo "<input class='button btn btn-primary' type='submit' value='Purchase Now!'>";

            echo "</form>";

            echo "</div>";
          }
        ?>
      </div>

      <div class="container">
        <div class="row mt-3 mb-5">
          <div class="col-4">
            <a href="adminorder.php"><button class="btn btn-success w-100">Show All Orders</button></a>
          </div>
          <div class="col-4">
            <a href="newproduct.php"><button class="btn btn-success w-100">Add New Product</button></a>
          </div>
          <div class="col-4">
            <a href="displayclasses.php"><button class="btn btn-success w-100">View Classes</button></a>
          </div>
        </div>
      </div>
    </body>
</html>