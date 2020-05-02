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

if (isset($_POST["fname"], $_POST["roomType"], $_POST["from_date"], $_POST["to_date"], $_POST["payment"], $_POST["paymentInfo"], $_POST["isRefundable"], $_POST["status"])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $roomType = mysqli_real_escape_string($conn, $_POST["roomType"]);
    $from_date = mysqli_real_escape_string($conn, $_POST["from_date"]);
    $to_date = mysqli_real_escape_string($conn, $_POST["to_date"]);
    $payment = mysqli_real_escape_string($conn, $_POST["payment"]);
    $paymentInfo = mysqli_real_escape_string($conn, $_POST["paymentInfo"]);
    $isRefundable = mysqli_real_escape_string($conn, $_POST["isRefundable"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);

    $query = "INSERT INTO reservation (fname, roomType, from_date, to_date, payment, isRefundable, status) VALUES('$fname', '$roomType', '$from_date', '$to_date', '$payment', '$paymentInfo','$isRefundable', '$status')";
    if (mysqli_query($conn, $query)) {
        echo 'Data Inserted';
    }
}
?>?>