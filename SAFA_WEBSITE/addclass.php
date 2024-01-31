<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Somerset Artisan Food Association  - Adding New Class...</title>

<body>
    <div class="container">
    <a class="text-decoration-none text-dark" href="index.php">
        <h1 class="display-1 text-center mb-5">Adding New Class..!</h1>
    </a>

        <?php

        $classname = $_GET['classname'];
        $classcost = $_GET['classcost'];
        $classdate = $_GET['classdate'];

        $conn = mysqli_connect("localhost", "root", "", "cheeseshop");

        $sql = "INSERT INTO classes(ClassName, Price, ClassDate) VALUES ('" .  $classname . "', " . $classcost . ", '" . $classdate . "')";

        mysqli_query($conn, $sql);

        
        die();
        ?>

    </div>
</body>

</html>