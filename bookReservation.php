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

if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $query = "SELECT * from room WHERE isChecked='false' ORDER BY id";
    $result = $conn->query($query);
    $query1 = "SELECT * from customer ORDER BY id";
    $result1 = $conn->query($query1);
    $from_date = "";
    $to_date = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://kit.fontawesome.com/bc1bd4a0aa.js" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
    </script>

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
            font-family: 'ionicons';
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

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th {
            background-color: #588c7e;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
    <title></title>
</head>
<body>
<div class="header">
    <div class="logo">
        <i class="fa fa-tachometer"></i>
        <span>Dashboard</span>
    </div>

</div>
<div class="side-nav">
    <div class="logo">
        <i class="fa fa-tachometer"></i>
        <span>Dashboard</span>
    </div>
    <nav>
        <ul>
            <li>
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
            <li class="active">
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
    <div class="main">


        <div class="container">
            <h2 align="center">Book Reservation</h2><br/>

            <div class="form">
                <form id="customerForm" method="post" action="bookComplete.php">

                    <div class="input-group">
                        <label>Room:</label>
                        <select name="room">
                            <?php while ($row = mysqli_fetch_array($result)):; ?>
                                <option><?php echo $row[1] ?></option>
                            <?php
                            endwhile; ?>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Customer:</label>
                        <select name="customer">
                            <?php while ($row = mysqli_fetch_array($result1)):; ?>
                                <option><?php echo $row[1] ?></option>
                            <?php
                            endwhile; ?>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>From Date:</label>
                        <input type="text" name="from_date" id="from_date" class="form-control"
                               placeholder="From Date"/>
                    </div>

                    <div class="input-group">
                        <label>To Date:</label>
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"/>

                    </div>

                    <div class="input-group">
                        <label>Payment</label>
                        <input type="text" name="payment" id="payment" class="payment" placeholder="Payment"/>
                    </div>

                    <div class="input-group">
                        <label>Payment Info</label>
                        <input type="text" name="paymentInfo" id="paymentInfo" class="paymentInfo" placeholder="paymentInfo"/>
                    </div>

                    <div class="input-group">
                        <label>Refundable</label>
                        <input type="text" name="isRefundable" id="isRefundable" class="isRefundable" placeholder="Refundable"/>
                    </div>

                    <div class="input-group">
                        <label>Status</label>
                        <input type="text" name="status" id="status" class="status" placeholder="Status"/>
                    </div>

                    <div class="input-group">
                        <button id="submit" type="submit" class="btn" name="add">Create a Reservation</button>
                    </div>

                    <div style="clear:both"></div>

                </form>

            </div>

        </div>

    </div>

    <script>
        $(document).ready(function () {
            $.datepicker.setDefaults({
                dateFormat: 'dd-mm-yy'
            });
            $(function () {
                $("#from_date").datepicker();
                $("#to_date").datepicker();
            });
            $('#submit').click(function () {
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if (from_date != '' && to_date != '') {
                    $.ajax({
                        method: "POST",
                        data: {from_date: from_date, to_date: to_date},
                        success: function (data) {
                            $('#input-group').html(data);
                        }
                    });
                } else {
                    alert("Please Select Date");
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
</body>
</html>