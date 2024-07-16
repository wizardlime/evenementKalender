<?php 

$host = 'localhost';
$db_name = 'evenement';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db_name;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    echo $e->getMessage();
} 