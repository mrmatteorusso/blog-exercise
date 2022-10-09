<?php

require_once "./helpers.php";

function test()
{
    echo "hello";
    exit;
}


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


$users = $pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);

$assoc_users = [];
foreach ($users as $user) {
    $assoc_users[$user['id']] = $user['user_name'];
}

$categories = $pdo->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_ASSOC);

$assoc_categories = [];
foreach ($categories as $category) {

    $assoc_categories[$category['id']] = $category['title'];
}







function displayArray($string, $array)
{
    echo "<pre>";
    echo $string;
    echo "</br>";
    print_r($array);
    echo "</pre>";
}

function displayArrayExit($string, $array)
{
    displayArray($string, $array);
    exit;
}


function displayString($string)
{
    echo $string;
    echo "</br>";
}

function displayStringExit($string)
{
    displayStringExit($string);
    exit;
}


//database function
//fetch users
//fetch blogs
