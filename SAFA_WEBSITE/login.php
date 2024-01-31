<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <style>
    body {
      margin: 20px;
    }

    form {
      max-width: 400px;
      margin: auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
  </style>
</head>

<body>
    <div class="container">
    <h1 class="display-1 text-center mb-5">The Cheese Shop - Login!</h1>
    <div class="display-6 text-center mb-5"><?php if (isset($_GET['login'])){echo $_GET['login'];}else{echo "<br>";} ?></div>
    <form action="verify.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" style="margin-bottom: 5px;"><br>
        <label style="color: red;"><?php if (isset($_GET['err'])){echo $_GET['err'];}else{echo "<br>";} ?></label><br>
        <input type="submit" value="Submit">
    </form>
    </div>

</body>

</html>


