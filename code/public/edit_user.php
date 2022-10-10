<?php

require_once "./helpers.php";

$id = $_GET['id'];

if (!empty($_POST)) {

    $category = $_POST['user_name'];
    $updated = date("Y-m-d H:i:s");

    updateBlog($title, $content, $category, $user_id, $updated, $id);

    header("location: ./create_user.php");
}



$user = fetchSingleRow("users", $user_name, $pdo_type = PDO::FETCH_OBJ);

displayArrayExit("user", $user);

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
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user; ?>">
        </div>
        </div>
        <input type="submit" class="btn btn-primary px-3" value=Save>
        <a class="btn btn-danger" href="./index.php" type="button">Cancel</a>
    </form>

</body>

</html>