<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Add</title>
</head>

<body>
    <div class="container">
        <h1>Fill Up this Form to Add New Book</h1>
        <?php
            $method = $_SERVER['REQUEST_METHOD'];
            if ($method == 'POST') {
                $allOk = true;

                if (!isset($_POST['title']) || $_POST['title'] == "") {
                    $allOk = false;
                }
                if (!isset($_POST['author']) || $_POST['author'] == "") {
                    $allOk = false;
                }
                if (!isset($_POST['available']) || $_POST['available'] == "") {
                    $allOk = false;
                }
                if (!isset($_POST['pages']) || $_POST['pages'] == "") {
                    $allOk = false;
                }
                if (!isset($_POST['isbn']) || $_POST['isbn'] == "") {
                    $allOk = false;
                }

                if ($allOk) {
                    $bookJson = file_get_contents('books.json');
                    $books = json_decode($bookJson, true);

                    $book['title'] = $_POST['title'];
                    $book['author'] = $_POST['author'];
                    $book['available'] = $_POST['available'];
                    $book['pages'] = $_POST['pages'];
                    $book['isbn'] = $_POST['isbn'];

                    $id = sizeof($books) + 1;
                    $book['id'] = $id;

                    array_push($books, $book);
                    $bookJson = json_encode($books);
                    file_put_contents('books.json', $bookJson);
                    echo '<p class="text-success">Book added</p>';
                } else {
                    echo '<p class="text-danger">All fields are required or invalid entry</p>';
                }
            }
        ?>
        <form class="m-3" method="POST" action="add.php">
            <div class="form-group m-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group m-3">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author">
            </div>
            <div class="form-group m-3">
                <label for="title">Pages</label>
                <input type="number" class="form-control" name="pages">
            </div>
            <div class="form-group m-3">
                <label for="title">ISBN</label>
                <input type="text" class="form-control" name="isbn">
            </div>
            <div class="form-group m-3">
                <label for="title">Availability</label>
                <input type="text" class="form-control" name="available">
            </div>
            <button class="btn btn-primary m-3" type="submit">Add</button>
        </form>
        <a href="index.php">Back to Home</a>
    </div>
</body>

</html>