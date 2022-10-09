<?php

require_once("./helpers.php");


$categories = $pdo->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_OBJ);
$users = $pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_OBJ);


if (isset($_POST) && count($_POST) > 0) {

    $query2 = "INSERT INTO blogs (title, content, category_id, user_id, created_at) 
    values (:title, :content, :category_id, :user_id, NOW()) ";

    $stmt = $pdo->prepare($query2);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':content', $_POST['content']);
    $stmt->bindParam(':category_id', $_POST['category']);
    $stmt->bindParam(':user_id', $_POST['user_id']);
    $stmt->execute();

    header("location: ./index.php");

    //validate
}
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
    <h1 class="mb-5">Add Post</h1>


    <form method="POST" class="mb-5">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
                <?php
                foreach ($categories as $category) {
                ?>

                    <option value="<?= $category->id ?>"> <?= $category->title ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="user_id">User Name</label>
            <select class="form-control" id="user_id" name="user_id">
                <?php
                foreach ($users as $user) {
                ?>

                    <option value="<?= $user->id ?>"> <?= $user->user_name ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <input type="submit" class="btn btn-primary px-3" value=Save>
        <a class="btn btn-danger" href="./index.php" type="button">Cancel</a>
    </form>

</body>

</html>