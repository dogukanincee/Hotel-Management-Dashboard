<?php
session_start();
if (!isset($_SESSION['check'])) {
    echo "<script> 
                   alert('Redirecting to Login');
                   window.location.href='login.php'; 
                   </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsive vertical menu navigation</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="main.css">

    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="main.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/bc1bd4a0aa.js" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        .ad {
            position: absolute;
            width: 300px;
            height: 250px;
            border: 1px solid #ddd;
            left: 50%;
            transform: translateX(-50%);
            top: 250px;
            z-index: 10;
        }

        .ad .close {
            position: absolute;
            font-family: 'ionicons', sans-serif;
            width: 20px;
            height: 20px;
            color: #fff;
            background-color: #999;
            font-size: 20px;
            left: -20px;
            top: -1px;
            display: table-cell;
            vertical-align: middle;
            cursor: pointer;
            text-align: center;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            $('.close').click(function () {
                $('.ad').css('display', 'none');
            })
        })
    </script>

</head>
<body>
<div class="header">
    <div class="logo">
        <i class="fa fa-tachometer"></i>
        <span>Dashboard</span>
        <ul>
            <li><a href="Home.php">HOME</a></li>
        </ul>
    </div>
</div>
<div class="side-nav">
    <div class="logo">
        <i class="fa fa-tachometer"></i>
        <span>Dashboard</span>
    </div>
    <nav>
        <ul>
            <li class="active">
                <a href="Home.php">
                    <span><i class="fas fa-home"></i></span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="showRooms.php">
                    <span><i class="fas fa-hotel"></i></span>
                    <span>Rooms</span>
                </a>
            </li>
            <li>
                <a href="showCustomers.php">
                    <span><i class="fas fa-users"></i></span>
                    <span>Customers</span>
                </a>
            </li>
            <li>
                <a href="showReservations.php">
                    <span><i class="fas fa-clipboard-list"></i></span>
                    <span>Reservations</span>
                </a>
            </li>
            <li>
                <a href="bookReservation.php">
                    <span><i class="fab fa-cc-visa"></i></span>
                    <span>Book Reservation</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <span><i class="fas fa-sign-out-alt"></i></span>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<div class="main-content">
    <div class="title">
        Analytics
    </div>
    <div class="main">
        <div class="widget" style="background-color: #eef1f7">
            <div class="title">Total Rooms</div>
            <div class="chart">
                <a href="showRooms.php">
                    <p style="color:black;font-size:100px;alignment: center;">
                        <?php

                        $host = "localhost";
                        $dbUsername = "root";
                        $dbPassword = "";
                        $dbname = "hotel-login";

                        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

                        $query = "SELECT * FROM room ";

                        $result = mysqli_query($conn, $query);

                        function get_all_data($connect)
                        {
                            $query = "SELECT * FROM room";
                            $result = mysqli_query($connect, $query);
                            return mysqli_num_rows($result);
                        }

                        echo get_all_data($conn);

                        ?>
                    </p>
                </a>
            </div>
        </div>
        <div class="widget" style="background-color: #eef1f7">
            <div class="title">Customers So Far</div>
            <div class="chart">
                <a href="showCustomers.php">
                    <p style="color:black;font-size:100px;alignment: center;">
                        <?php
                        $host = "localhost";
                        $dbUsername = "root";
                        $dbPassword = "";
                        $dbname = "hotel-login";

                        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
                        $query = "SELECT * FROM customer ";
                        $result = mysqli_query($conn, $query);

                        function get_all_data1($connect)
                        {
                            $query = "SELECT * FROM customer";
                            $result = mysqli_query($connect, $query);
                            return mysqli_num_rows($result);
                        }

                        echo get_all_data1($conn);

                        ?>
                    </p>
                </a>
            </div>
        </div>
        <div class="widget" style="background-color: #eef1f7">
            <div class="title">Reservations So Far</div>
            <div class="chart">
                <a href="showReservations.php">
                    <p style="color:black;font-size:100px;alignment: center;">
                        <?php

                        $host = "localhost";
                        $dbUsername = "root";
                        $dbPassword = "";
                        $dbname = "hotel-login";

                        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

                        $query = "SELECT * FROM customer ";

                        $result = mysqli_query($conn, $query);

                        function get_all_data2($connect)
                        {
                            $query = "SELECT * FROM reservation";
                            $result = mysqli_query($connect, $query);
                            return mysqli_num_rows($result);
                        }

                        echo get_all_data2($conn);

                        ?>
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>