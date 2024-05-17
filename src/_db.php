<?php

$host = "10.5.0.3";
$db = $_ENV['MYSQL_DATABASE'];
$charset = 'utf8mb4';
$user = "root";
$pass = $_ENV['MYSQL_ROOT_PASSWORD']; 
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = "mysql:host=$host;dbname=$db;port=3306;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), $e->getCode());
}
