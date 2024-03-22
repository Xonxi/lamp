<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset ($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_FILES["image"]["name"];
        $target_dir = "uploads/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . time() . '-' . basename($image);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $mysqli = new mysqli("localhost", "root", "", "test");
            if ($mysqli === false) {
                die ("ERROR: Could not connect. " . $mysqli->connect_error);
            }
            $sql = "INSERT INTO images (title, description, image) VALUES (?, ?, ?)";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("sss", $title, $description, $target_file);
                if ($stmt->execute()) {
                    echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                    header("Location: AdminPanel.php");
                } else {
                    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                }
                if ($stmt instanceof mysqli_stmt) {
                    $stmt->close();
                }
            }
            $mysqli->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error: " . $_FILES["image"]["error"];
    }
}
?>