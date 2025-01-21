<?php
session_start();
include_once 'db.php';

$host = "lrgs.ftsm.ukm.my";
$dbname = "a186635";
$user = "a186635";
$password = "cuteblacktiger";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve id and other form data
    $id = $_POST["id"];

    // Fetch the position and password based on the provided id from your database
    $query = "SELECT position, password FROM login_info WHERE Matric_No = :id"; // Replace your_table with your actual table name
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Check if the password matches
        if ($_POST["password"] === $result['password']) {
            $_SESSION['user_id'] = $id;
            $_SESSION['position'] = $result['position'];

            // Redirect based on the fetched position
            switch ($result['position']) {
                case "PERTAMA":
                    header("Location: PERTAMA_Index.php");
                    break;
                case "FTSM Member":
                    header("Location: FTSMMember_Index.php");
                    break;
                case "FTSM Management":
                    header("Location: FTSMManagement_Index.php");
                    break;
                case "Counselor":
                    header("Location: Counseling_Index.php");
                    break;
                default:
                    // Handle other positions or set a default redirect
                    break;
            }
            exit(); // Ensure the script stops execution after the redirect
            } else {
        // Password doesn't match
        echo "<script>alert('Invalid Password');</script>";
        echo "<script>window.location='login.php';</script>";
    }
} else {
    // Handle the case where the id is not found in the database
    echo "<script>alert('Invalid ID');</script>";
    echo "<script>window.location='login.php';</script>";
}

}
?>