<?php

//phpinfo();


// $user = 'gssdvq1oz8bvlpvy';
// $password = 'y6r57fswz6owh5op';
// $host = 'ltnya0pnki2ck9w8.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
// $dbName = 'p5t3d4ceejfhd8q6';

// $database = new PDO("mysql:host=$host;dbname=$dbName;", $user, $password, [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_PERSISTENT => true
// ]);

// echo "ciao2";
// exit;

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



$data = $pdo->query('SELECT * FROM blog')->fetchAll(PDO::FETCH_ASSOC);
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
    <h1 class="mb-5">Super Blog</h1>

    <form method="POST" class="mb-5">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category">
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
            <textarea class="form-control" id="content" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" id="user_name">
        </div>
        <button type="button" class="btn btn-primary px-3">Save</button>
    </form>


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
                    <th scope="row"><?php echo $data[$product]['id']; ?></th>
                    <td><?php echo $data[$product]['title']; ?></td>
                    <td><?php echo $data[$product]['content']; ?></td>
                    <td><?php echo $data[$product]['category_name']; ?></td>
                    <td><?php echo $data[$product]['user_name']; ?></td>
                    <td><?php echo $data[$product]['created_at']; ?></td>
                    <td><?php echo empty($data[$product]['updated']) ? "-" : $data[$product]['updated']; ?></td>
                    <td><button type="button" class="btn btn-primary px-3">Edit</button></td>
                    <td><button type="button" class="btn btn-danger px-3">Delete</button></td>
                </tr>

            <?php
            }

            ?>
        </tbody>

    </table>

</body>

</html>


<?php
//my_sqli
// $host = 'mysqlblog';
// $db = 'test';
// $user = 'root';
// $pass = 'password';

// $connection = mysqli_connect($host, $user, $pass, $db);
// //echo $connection;
// echo "ciao";
// exit;
// $query = "SELECT * FROM blog";
// $mysqli_query = mysqli_query($connection, $query);

// echo $mysqli_query;