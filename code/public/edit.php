<?php

require_once "./helpers.php";

$id = $_GET['id'];

if (!empty($_POST)) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category_id'];
    $user_id = $_POST['user_id'];
    $updated = date("Y-m-d H:i:s");

    updateBlog($title, $content, $category, $user_id, $updated, $id);

    header("location: ./index.php");
}
$users = fetchTable("users");
$assoc_users = transformIntoAssocArray($users, "id", "user_name");

$categories = fetchTable("categories");
$assoc_categories = transformIntoAssocArray($categories, "id", "title");

$data = fetchSingleRow("blogs", $id);

$title = $data['title'];
$content = $data['content'];
$category_id = $data['category_id'];
$user_id = $data['user_id'];

$user = fetchSingleRow("users", $user_id, $pdo_type = PDO::FETCH_OBJ);

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