<?php

require_once "./helpers.php";

$host = 'mysqlblog';
$db   = 'EXERCISE01';
$user = 'root';
$pass = 'password';
$charset = 'utf8mb4';
$id = $_GET['id'];

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




if (!empty($_POST)) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category_id'];
    $user_id = $_POST['user_id'];
    $updated = date("Y-m-d H:i:s");

    $sql = "UPDATE blogs SET title=?, content=?, category_id=?, user_id=?, updated=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $category, $user_id, $updated, $id]);

    header("location: ./index.php");
}



$categories = $pdo->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_ASSOC);
$users = $pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);

$assoc_categories = [];
foreach ($categories as $category) {
    $assoc_categories[$category['id']] = $category['title'];
}

$assoc_users = [];
foreach ($users as $user) {
    $assoc_users[$user['id']] = $user['user_name'];
}


$query = "SELECT * FROM blogs WHERE id = ?";

$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_OBJ);

$title = $data->title;
$content = $data->content;
$category_id = $data->category_id;
$user_id = $data->user_id;

// select user name from users
$query_id_users = "SELECT * FROM users WHERE id = ?";
$stmt2 = $pdo->prepare($query_id_users);

$stmt2->execute([$user_id]);

$user = $stmt2->fetch(PDO::FETCH_ASSOC);

// displayArrayExit("row of user", $user['user_name']);


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
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">

                <?php
                foreach ($categories as $category) {
                ?>
                    <option value="<?= $category['id'] ?>" <?= $category_id === $category['id'] ? 'selected' : '' ?>> <?= $category['title'] ?></option>

                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content"><?php echo $content; ?></textarea>
        </div>
        <div class="form-group">
            <label for="user_id">User Name</label>
            <select class="form-control" id="user_id" name="user_id">

                <?php
                foreach ($users as $user) {
                ?>
                    <option value="<?= $user['id'] ?>" <?= $user_id === $user['id'] ? 'selected' : '' ?>> <?= $user['user_name'] ?></option>

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