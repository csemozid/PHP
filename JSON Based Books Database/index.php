<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>JSON Based Book Datebase</title>
</head>

<body>
    <div class="container bg-light bg-gradient">
        <br> <br>
            <p class="h2">PHP Book Query Project</p>
            <br>
            <div class="row">
                <div class="col">
                    <?php
                        $bookJson = file_get_contents('books.json');
                        $books = json_decode($bookJson, true);
                    ?>
                    <form class="form m-2" action="search.php">
                        <input type="text" class=" mb-2" name="title" placeholder="Enter Book Title">
                        <button class="btn btn-outline-success btn-sm mb-1" type="submit">Search Book</button>
                    </form>

                </div>
                <div class="col">
                    
                </div>
            <div class="col">
                <a href="add.php" class="float-right">Click Here to Add New Book</a>
            </div>
    </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Pages</th>
                    <th>Availability</th>
                    <th>ISBN</th>
                    <th>Delete</th>
                </tr>
            </thead>
            
            <?php foreach ($books as $book) : ?>
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
            <?php endforeach; ?>
        </table>

    </div>
    <script>
        function onDelete() {
            return confirm("Are You Sure to Delete");
        }
    </script>
</body>

</html>





