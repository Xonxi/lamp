<?php
$hostname = "localhost";
$userName = "root";
$password = "";
$dbName = "test";

$con = mysqli_connect($hostname, $userName, $password, $dbName);

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_error();
    exit();
}

echo "Connected successfully";


mysqli_close($con);
?>