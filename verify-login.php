<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit;
        }

        $mysqli = new mysqli("localhost", "root", "", "test");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $role = $row['role'];

            $_SESSION['role'] = $role;
            $_SESSION['user_id'] = $row['user_id'];

            echo "Login successful";

            if ($role === "user") {
                header("Location: kryefaqja.php");
                exit;
            } elseif ($role === "admin") {
                header("Location: AdminPanel.html");
                exit;
            }
        } else {
            echo "Invalid email or password.";
        }

        $stmt->close();
        $mysqli->close();
    } else {
        echo "Email and password are required.";
    }
}
?>