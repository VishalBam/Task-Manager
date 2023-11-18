<?php
$db_host = "localhost:3306";
$db_user = "root";
$db_password = "2468";
$db_name = "task_manager";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>