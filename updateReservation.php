<?php
session_start();
if (!isset($_SESSION['check'])) {
    echo "<script> 
                   alert('Redirecting to Login');
                   window.location.href='login.php'; 
                   </script>";
}
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hotel-login";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (isset($_POST["id"])) {
    $value = mysqli_real_escape_string($conn, $_POST["value"]);
    $query = "UPDATE reservation SET " . $_POST["column_name"] . "='" . $value . "' WHERE id = '" . $_POST["id"] . "'";
    if (mysqli_query($conn, $query)) {
        echo 'Data Updated';
    }
}
?>