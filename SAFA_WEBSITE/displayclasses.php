<!DOCTYPE html>
<html>
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
      <title>Somerset Artisan Food Association - View Classes</title>

        <style>
            .newItem{
              display: inline-block;   
              height: 190px;
              min-width: 250px;
              min-height: 190px;
              padding: 10px;
              border-bottom: 2px solid #0d6efd;
            }

            .button{
              margin-top: 10px;
              width: 100%;
            }

            h2, h3{
                white-space: nowrap;
                font-size: 1.4vw;
            }
        </style>
    </head>

    <body>
      <div class="container">
        <h1 class="display-1 text-center mb-5">Somerset Artisan Food Association !</h1>

        <?php
          session_start();
          $conn = mysqli_connect("localhost", "root", "", "cheeseshop");

          $sql = "SELECT ClassID, ClassName, Price, ClassDate FROM classes";
          $result = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_assoc($result)) {
            $ClassID = $row["ClassID"];
            $ClassName = $row["ClassName"];
            $Price = $row["Price"];
            $ClassDate = $row["ClassDate"];

            echo "<div class='newItem col-3' title='" . $ClassID . "'>";

            echo "<form method='GET' action='buyclass.php'>";

            echo "<h2>" . $ClassName . "</h2>";
            echo "<h3>£" . $Price . "</h3>";
            echo "<h3>" . $ClassDate . "</h3>";

            echo "<input type='hidden' name='classid' value='" . $ClassID . "'>";

            //echo "<input type='hidden' name='customerid' value='" . $_SESSION['userID'] . "'>";
            echo "<input type='hidden' name='customerid' value='" . 1 . "'>";

            echo "<input class='button btn btn-primary' type='submit' value='Book Now!'>";

            echo "</form>";

            echo "</div>";
          }
        ?>
      </div>
    </body>
</html>