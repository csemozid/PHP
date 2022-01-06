<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Books</title>
</head>

<body>
    <div class="container">
        <?php
            $bookJson = file_get_contents('books.json');
            $books = json_decode($bookJson, true);
        ?>
        <h1>Books</h1>
        <form class="form m-3" action="search.php">
            <input type="text" class="form-control mb-3" name="title" placeholder="Book title">
            <button class="btn btn-primary mb-3" type="submit">Search</button>
        </form>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Pages</th>
                <th>Available</th>
                <th>ISBN</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($books as $book) : ?>
                <?php if ($book['title'] == $_GET['title']) : ?>
                    <tr>
                        <td><?php echo $book['id']; ?></td>
                        <td><?php echo htmlentities($book['title']); ?></td>
                        <td><?php echo htmlentities($book['author']); ?></td>
                        <td><?php echo $book['pages']; ?></td>
                        <td><?php echo $book['available'] ? "available" : "not available"; ?></td>
                        <td><?php echo htmlentities($book['isbn']); ?></td>
                        <td>
                            <form action="delete.php" method="post" onsubmit="return onDelete()">
                                <input type="hidden" name="id" value="<?php echo $book['id'] ?>">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach; ?>
        </table>
        <a href="index.php">Back to Home</a>
    </div>
</body>

</html>