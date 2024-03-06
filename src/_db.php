<?php

$pdo;
$host = "10.5.0.3";
$db = $_ENV['MYSQL_DATABASE'];
$dsn = "mysql:host=$host;port=3306;dbname=$db";
$user = "root";
$pass = $_ENV['MYSQL_ROOT_PASSWORD']; 

if (!$conn = new PDO($dsn, $user, $pass)){
    die("Bad connect $host");
}
