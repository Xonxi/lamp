<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }


    $mysqli = new mysqli("localhost", "user", "new_password", "testing");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        echo "Login successful";
        header("Location: kryefaqja.php");
        exit;
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
    $mysqli->close();
}
?>