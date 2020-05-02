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

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

if (!empty($firstname) || !empty($lastname) || !empty($username)
    || !empty($email) || !empty($password) || !empty($gender)) {

    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $SELECT = "SELECT * From users Where email = '$email' Limit 1";

        $INSERT = "INSERT Into users(firstname, lastname, username, email, password, gender) 
        values (?,?,?,?,?,?)";

        $result = mysqli_query($conn, $SELECT);
        $num = mysqli_fetch_array($result);

        if ($num["email"] == $email) {
            echo "<script> 
                   alert('Email is already registered');
                   window.location.href='register.php'; 
                   </script>";
        } else {
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssss", $firstname, $lastname, $username, $email, $password, $gender);

            /* execute query */
            $stmt->execute();
            /* fetch value */
            $stmt->store_result();

            $stmt->close();
            $conn->close();
            echo "Added to the Database";
            echo("Successful Registered!");
            session_start();
            $_SESSION['check'] =23;
            header('Location:home.php');
            exit();
        }
    }

} else {
    echo "All fields are required";
    die();
}

?>