<?php
require 'db_connect.php';    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $emailId = $_POST['emailId'];

    // Hash the password using password_hash
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // SQL query to insert user data into the database
    $sql = "INSERT INTO users_details (firstName, lastName, userName, password, emailId) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sssss', $firstName, $lastName, $userName, $hashedPassword, $emailId);



    

    if ($stmt->execute()) {
        echo "Registration successful.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
