<?php

$host = "172.17.0.1";
$user = "root";
$pass = ''; //$pass = $_ENV['db_pass'];
$db = 'mileage';

if (!$conn = mysqli_connect($host, $user, $pass)) {
    die("Bad connect $host");
}
