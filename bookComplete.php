<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

$fname = $_POST['customer'];
$roomType = $_POST['room'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$payment = $_POST['payment'];
$paymentInfo = $_POST['paymentInfo'];
$isRefundable = $_POST['isRefundable'];
$status = $_POST['status'];
$querycheck = "SELECT * FROM reservation";

$query_result = $conn->query($querycheck);

if ($query_result == TRUE) {
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $INSERT = "INSERT Into reservation(fname, roomType, from_date , to_date, payment, paymentInfo, isRefundable, status) 
        values (?,?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssssss", $fname, $roomType, $from_date, $to_date, $payment, $paymentInfo, $isRefundable, $status);

        /* execute query */
        $stmt->execute();
        /* fetch value */
        $stmt->store_result();

        $stmt->close();
        $conn->close();
        $conn->close();
        echo "<script> alert('Reservation is added. Redirecting to Home'); </script>";
        header('Location:Home.php');
        exit();
    }
}
?>