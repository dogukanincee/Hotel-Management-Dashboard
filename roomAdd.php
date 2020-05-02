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

$errors = array();

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (isset($_POST["roomType"], $_POST["price"], $_POST["isChecked"])) {
    $roomType = mysqli_real_escape_string($conn, $_POST["roomType"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $bedCount = mysqli_real_escape_string($conn, $_POST["bedCount"]);
    $isAvailable = mysqli_real_escape_string($conn, $_POST["isAvailable"]);
    $isChecked = mysqli_real_escape_string($conn, $_POST["isChecked"]);

    $query = "INSERT INTO room(roomType, price, bedCount, isAvailable, isChecked) VALUES('$roomType', '$price', '$bedCount','$isAvailable', '$isChecked')";
    if (mysqli_query($conn, $query)) {
        echo 'Data Inserted';
    }
}
?>?>