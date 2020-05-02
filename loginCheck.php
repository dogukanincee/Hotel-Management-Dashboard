<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hotel-login";

$username = "";
$email = "";
$errors = array();
$_SESSION['success'] = "";
$_SESSION['check'] =0;

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) || !empty($password)) {

    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        echo "";
        $VALIDATE = "SELECT * From users Where username = '$username' && password='$password' Limit 1";

        $validationResult = mysqli_query($conn, $VALIDATE);
        $num1 = mysqli_fetch_array($validationResult);

        if ($num1["username"] == $username && $num1["password"] == $password) {
            echo("Successful Logged In!");
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['check'] = 23;
            header('Location:home.php');
        } else {
            echo "<script> 
                   alert('Invalid username or password');
                   window.location.href='login.php'; 
                   </script>";
            exit();
        }
    }

} else {
    echo "All fields are required";
    die();
}

?>