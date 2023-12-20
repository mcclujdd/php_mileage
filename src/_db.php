<?php

$host = "10.5.0.3";
$user = "root";
$pass = $_ENV['MYSQL_ROOT_PASSWORD']; 
$db = $_ENV['MYSQL_DATABASE'];
$conn = mysqli_connect($host, $user, $pass, $db,);

//if (!$conn = mysqli_connect($host, $user, $pass, $db)) {
    //die("Bad connect $host");
//}
