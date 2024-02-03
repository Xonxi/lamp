<?php


$mysqli = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT description FROM photos";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $descriptions = array();
    while ($row = $result->fetch_assoc()) {
        $descriptions[] = $row['description'];
    }
    header('Content-Type: application/json');
    echo json_encode($descriptions);
} else {
    echo "No descriptions found in the database.";
}

$mysqli->close();
?>