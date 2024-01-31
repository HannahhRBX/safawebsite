<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Somerset Artisan Food Association  - Add a New Class</title>

<body>
    <div class="container">
        <a class="text-decoration-none text-dark" href="index.php">
            <h1 class="display-1 text-center mb-5">Somerset Artisan Food Association !</h1>
        </a>
        <h2 class="display-4 text-center mb-5">Add a New Class</h1>

            <form method="GET" action="addclass.php">
                <div class="form-group">
                    <label for="classname">Class Name</label>
                    <input type="text" class="form-control" name="classname" placeholder="Class Name">
                </div>

                <br/>

                <div class="form-group">
                    <label for="classcost">Class Cost</label>
                    <input type="number" class="form-control" step="0.01" name="classcost" placeholder="Class Cost">
                </div>

                <br/>

                <div class="form-group">
                    <label for="classdate">Class Date</label>
                    <input type="date" class="form-control" name="classdate" placeholder="Class Date">
                </div>

                <br/>

                <button type="submit" class="btn btn-primary">Add New Class</button>
            </form>

    </div>
</body>

</html>