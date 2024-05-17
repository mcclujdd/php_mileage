<?php

$host = "10.5.0.3";
$db = $_ENV['MYSQL_DATABASE'];
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
$user = "root";
$pass = $_ENV['MYSQL_ROOT_PASSWORD']; 

$pdo = new PDO($dsn, $user, $pass);
