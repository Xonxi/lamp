<?php

// Create a connection
$mysqli = new mysqli("localhost", "root", "", "test");

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve data from the AJAX request
$action = $_POST['action'];
$slideIndex = $_POST['slideIndex'];

if ($action === 'update') {
    // Update query
    $newDescription = $_POST['newDescription'];
    $sql = "UPDATE photos SET description = '$newDescription' WHERE id = $slideIndex";
} elseif ($action === 'delete') {
    // Delete query
    $sql = "DELETE FROM photos WHERE id = $slideIndex";
}


// Execute the query
if ($mysqli->query($sql) === TRUE) {
    echo "Operation successful";
} else {
    echo "Error during $action: " . $mysqli->error . "<br>";
    echo "SQL query: $sql";
}

// Close the connection
$mysqli->close();
?>