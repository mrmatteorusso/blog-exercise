<?php

require_once("./helpers.php");

$data = $pdo->query('SELECT * FROM blogs')->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Super Blog</title>
</head>

<body>
    <div>
        <h1>Super blog</h1>
    </div>
    <div>
        <a href="./create.php" class="btn btn-primary my-5 px-3">Add new blog</a>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Category</th>
                <th scope="col">User</th>
                <th scope="col">Created on</th>
                <th scope="col">Updated</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $product => $attribute) {
            ?>
                <tr>
                    <th scope="row"><?php echo $data[$product]->id; ?></th>
                    <td><?php echo $data[$product]->title; ?></td>
                    <td><?php echo $data[$product]->content; ?></td>
                    <td><?php echo $assoc_categories[$data[$product]->category_id]; ?></td>
                    <td><?php echo $assoc_users[$data[$product]->user_id]; ?></td>
                    <td><?php echo $data[$product]->created_at; ?></td>
                    <td><?php echo (!empty($data[$product]->updated)) ? $data[$product]->updated : "-"; ?></td>
                    <td><a href="./edit.php?id=<?php echo $data[$product]->id; ?>" type="button" class="btn btn-primary px-3">Edit</a></td>
                    <td><a href="./delete.php?id=<?php echo $data[$product]->id; ?>" type="button" class="btn btn-danger px-3">Delete</a></td>
                </tr>

            <?php
            }

            ?>
        </tbody>

    </table>
</body>

</html>


<?php
