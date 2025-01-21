<?php    
session_start();  
unset($_SESSION["id"]);  // unset other session variables if any
session_destroy();  
header("location: MainPage.php");  
exit;  
?> 