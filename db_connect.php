<?php
$hostname="localhost";
$userName="root";
$password="";
$database="project";

$mysqli = new mysqli($hostname,$userName,$password,$database);

if($mysqli->connect_error)
{
    die("connection_falied".$mysqli->connect_error);
}
else{
    echo "datbase connected successfully";
}
?>

