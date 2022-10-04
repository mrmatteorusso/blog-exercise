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



$data = $pdo->query('SELECT * FROM blogs')->fetchAll(PDO::FETCH_OBJ);

// echo "<pre>";
// print_r($data);
// echo "</pre>";

// foreach ($data as $product) {
//     echo $product['id'];
//     // echo $product . " = " . $product['id'];
//     // echo "</br>";
//     // echo $attribute;
//     echo "</br>";
// }
//exit;
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
                    <td><?php echo $data[$product]->category_name; ?></td>
                    <td><?php echo $data[$product]->user_name; ?></td>
                    <td><?php echo $data[$product]->created_at; ?></td>
                    <td><?php echo empty($data[$product]->updated) && "-"; ?></td>
                    <td><a href="./edit.php" type="button" class="btn btn-primary px-3">Edit</a></td>
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
