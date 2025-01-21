
<?php

$servername = "lrgs.ftsm.ukm.my";
$username = "a186635";
$password = "cuteblacktiger";
$dbname = "a186635";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>