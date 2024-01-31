<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted with the POST method

    // Retrieve form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $mysqli = new mysqli("localhost", "user", "new_password", "testing");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO users (name, surname, age, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $surname, $age, $email, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $mysqli->close();
}
?>