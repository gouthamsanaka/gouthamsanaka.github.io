<?php
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id = $_POST["Id"];
    $userName = $_POST["userName"];
    $emailId = $_POST["emailId"];
    $password = $_POST["password"];

    // Insert data into the database
    $sql = "INSERT INTO users (Id,userName, emailId,password) VALUES ('$Id',$userName', '$emailId','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
