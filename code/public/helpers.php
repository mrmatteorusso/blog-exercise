<?php

require_once "./helpers.php";

function test()
{
    echo "hello";
    exit;
}

$dbExists = false;
function connect()
{

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
        // if(!$dbExists){
        //     $dbExists = checkifItExists();
        // }
        // if(!$dbExists){
        //     createDB();
        //     createTable();
        //     $dbExists=true;
        // }
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}



function fetchTable($table_name, $pdo_type = PDO::FETCH_ASSOC)
{
    $pdo = connect();
    $data = $pdo->query('SELECT * FROM ' . $table_name)->fetchAll($pdo_type);
    return $data;
}


//the following 2
function fetchSingleRow($table, $id, $pdo_type = PDO::FETCH_ASSOC)
{
    $pdo = connect();
    $query = "SELECT * FROM " . $table . " WHERE id = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $data = $stmt->fetch($pdo_type);
    return $data;
}


function transformIntoAssocArray($oldArries, $column1, $column2)
{

    $assoc_array = [];
    foreach ($oldArries as $subArray) {
        $assoc_array[$subArray[$column1]] = $subArray[$column2];
    }
    return $assoc_array;
}

function insertIntoBlogs()
{
    $pdo = connect();

    $query = "INSERT INTO blogs (title, content, category_id, user_id, created_at) 
    values (:title, :content, :category_id, :user_id, NOW()) ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':content', $_POST['content']);
    $stmt->bindParam(':category_id', $_POST['category']);
    $stmt->bindParam(':user_id', $_POST['user_id']);
    $stmt->execute();
}

function insertIntoUsers()
{
    $pdo = connect();

    $query = "INSERT INTO users (user_name, created_at) 
    values (:user_name, NOW()) ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_name', $_POST['user_name']);
    $stmt->execute();
}

function updateBlog($title, $content, $category, $user_id, $updated, $id)
{
    $pdo = connect();
    $sql = "UPDATE blogs SET title=?, content=?, category_id=?, user_id=?, updated=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $category, $user_id, $updated, $id]);
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
