<?php


$host = 'mysqlblog';
$db   = 'EXERCISE01';
$user = 'root';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


if (isset($_POST) && count($_POST) > 0) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $query = "INSERT INTO blogs (title, content, category_name, user_name, created_at) 
    values (:title, :content, :category_name, :user_name, NOW()) ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':content', $_POST['content']);
    $stmt->bindParam(':category_name', $_POST['category']);
    $stmt->bindParam(':user_name', $_POST['user_name']);

    $stmt->execute();

    //header("location: ./index.php");

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
                <option>Choose</option>
                <option>Music</option>
                <option>Book</option>
                <option>Cinema</option>
                <option>Teathre</option>
                <option>Other..</option>
            </select>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name">
        </div>
        <input type="submit" class="btn btn-primary px-3" value=Save>
        <a class="btn btn-danger" href="./index.php" type="button">Cancel</a>
    </form>

</body>

</html>