<?php

//phpinfo();
echo "ciao";

$connection = mysqli_connect(hostname: 'localhost:8902', username: 'root', password: 'password', database: 'EXERCISE01');
echo $connection;
exit;
echo "ciao";
$query = "SELECT * FROM blog";
$mysqli_query = mysqli_query($connection, $query);

echo $mysqli_query;
