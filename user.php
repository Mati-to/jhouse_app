<?php
require 'includes/app.php';
$db = connectionDB();

$email = 'email@example.com';
$password = '123456';
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$query =  " INSERT INTO users (email, password) VALUES ('$email', '$passwordHash') ";

mysqli_query($db, $query);
?>

