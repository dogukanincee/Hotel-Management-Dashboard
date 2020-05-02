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
$errors = array();

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (isset($_POST["fname"], $_POST["surname"], $_POST["mail"], $_POST["gender"], $_POST["phone"], $_POST["birthday"], $_POST["membership"])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $surname = mysqli_real_escape_string($conn, $_POST["surname"]);
    $mail = mysqli_real_escape_string($conn, $_POST["mail"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $birthday = mysqli_real_escape_string($conn, $_POST["birthday"]);
    $membership = mysqli_real_escape_string($conn, $_POST["membership"]);
    $query = "INSERT INTO customer(fname, surname, mail, gender, phone, birthday, membership) VALUES('$fname', '$surname', '$mail', '$gender', '$phone', '$birthday', '$membership')";
    if (mysqli_query($conn, $query)) {
        echo 'Data Inserted';
    }
}
?>