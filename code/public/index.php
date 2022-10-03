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
// $data->execute();
echo "<pre>";
print_r($data);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php foreach ($data as $product => $attribute) {

    ?>

        <h1><?php echo $data[$product]['title']; ?></h1>
        <p><?php echo $data[$product]['content']; ?></p>
        <p><?php echo $data[$product]['user_name']; ?></p>
        <p><?php echo $data[$product]['created_at']; ?></p>

    <?php
    }

    ?>

</body>

</html>



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