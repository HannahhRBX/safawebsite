<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Somerset Artisan Food Association  - Add a New Product</title>

<body>
    <div class="container">
        <a class="text-decoration-none text-dark" href="index.php">
            <h1 class="display-1 text-center mb-5">Somerset Artisan Food Association !</h1>
        </a>
        <h2 class="display-4 text-center mb-5">Add a New Product</h1>

            <form method="GET" action="addproduct.php">
                <div class="form-group">
                    <label for="productname">Product Name</label>
                    <input type="text" class="form-control" name="productname" placeholder="Product Name">
                </div>

                <br/>

                <div class="form-group">
                    <label for="productcost">Product Cost</label>
                    <input type="number" class="form-control" step="0.01" name="productcost" placeholder="Product Cost">
                </div>

                <br/>

                <div class="form-group">
                    <label for="productcost">Product Image URL</label>
                    <input type="text" class="form-control" name="producturl" placeholder="Product Image URL">
                </div>

                <br/>
                
                <label style="color: red;"><?php if (isset($_GET['err'])){echo $_GET['err'];} ?></label><br>
                <button type="submit" class="btn btn-primary">Add New Product</button>
            </form>

    </div>
</body>

</html>