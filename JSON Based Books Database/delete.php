<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Delete</title>
</head>

<body>
    <div class="container">
        <?php
            if (!isset($_POST['id'])) {
                echo 'ID not set';
            } else {
                $bookJson = file_get_contents('books.json');
                $books = json_decode($bookJson, true);
                $arr = [];
                foreach ($books as $book) {
                    if ($book['id'] != $_POST['id']) {
                        array_push($arr, $book);
                    }
                }
                $books = json_encode($arr);
                file_put_contents('books.json', $books);
                echo '<p class="text-danger">Book deleted</p>';
                echo '<a href="index.php">Back to Home</a>';
            }
        ?>
    </div>
</body>

</html>