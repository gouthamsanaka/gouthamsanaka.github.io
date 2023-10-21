<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_details WHERE userName = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $userName);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row && password_verify($password, $row['password'])) {
            echo "Login successful.";
        } else {
            echo "Invalid userName or password.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
