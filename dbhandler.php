<?php

$serverName = "bmskart-db-1";
$dbUserName = "root";
$dbPassword = "1234";
$dbName = "WebDevProject";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed : " . mysqli_error());
}
