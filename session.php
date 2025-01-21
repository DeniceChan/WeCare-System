<?php

include_once 'database.php';
session_start();

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_SESSION['user_id'];

// Extract user information from the database
if ($id == '') {
    header("location: login_page.php");
} else {
    $stmt = $conn->prepare("SELECT * FROM login_info WHERE Matric_No = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);

    $id = $readrow['Matric_No'];
    $name = $readrow['Name'];
    $password = $readrow['password'];
    $position = $readrow['position'];
}
?>
