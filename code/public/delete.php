<?php
require_once "./helpers.php";

$id = $_GET['id'];

$sql = "DELETE FROM blogs WHERE id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("location: ./index.php");
