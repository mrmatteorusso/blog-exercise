<?php

require_once("./helpers.php");


if (isset($_POST) && count($_POST) > 0) {
    insertIntoUsers();
    //header("location: ./index.php");
}
$users = fetchTable("users", $pdo = PDO::FETCH_OBJ);
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
    <h1 class="mb-5">Add User</h1>
    <form method="POST" class="mb-5">
        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name">
        </div>
        <input type="submit" class="btn btn-primary px-3" value=Save>
        <a class="btn btn-danger" href="./index.php" type="button">Cancel</a>
        <a class="btn btn-primary" href="./index.php" type="button">Go back to Index</a>
    </form>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Created on</th>
                <th scope="col">Updated</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user) {
            ?>
                <tr>
                    <th scope="row"><?php echo $user->id; ?></th>
                    <td><?php echo $user->user_name; ?></td>
                    <td><?php echo $user->created_at; ?></td>
                    <td><?php echo (!empty($user->updated)) ? $user->updated : "-"; ?></td>
                    <td><a href="./edit_user.php?id=<?php echo $user->id; ?>" type="button" class="btn btn-primary px-3">Edit</a></td>
                    <td><a href="./delete.php?id=<?php echo $user->id; ?>" type="button" class="btn btn-danger px-3">Delete</a></td>
                </tr>

            <?php
            }
            ?>
        </tbody>

    </table>
</body>



</html>