<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = "user";

    $mysqli = new mysqli("localhost", "root", "", "test");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }


    $stmt = $mysqli->prepare("INSERT INTO users (name, surname, email, password, role) VALUES (?, ?, ?, ?, ?)");

    // Check if the prepare statement was successful
    if (!$stmt) {
        die("Error in prepare statement: " . $mysqli->error);
    }

    // Adjust the bind_param statement based on your column types
    $stmt->bind_param("sssss", $name, $surname, $email, $password, $role);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: koleksioni.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>