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
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/bc1bd4a0aa.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

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
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .box {
            width: 1270px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 25px;
            box-sizing: border-box;
        }
    </style>

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
    <a href="#" class="nav-trigger"><span></span></a>
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
            <li class="active">
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
    <div class="main">
        <div class="container box">
            <h1 align="center">Customer List</h1>
            <br/>
            <div class="table-responsive">
                <br/>
                <div align="right">
                    <button type="button" name="add" id="add" class="btn btn-info">Add</button>
                </div>
                <br/>
                <div id="alert_message"></div>
                <table id="user_data" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Mail</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th>Membership</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
</div>

</body>
</html>

<script type="text/javascript" language="javascript">
    $(document).ready(function () {

        fetch_data();

        function fetch_data() {
            var dataTable = $('#user_data').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "fetchCustomer.php",
                    type: "POST"
                }
            });
        }

        function update_data(id, column_name, value) {
            $.ajax({
                url: "updateCustomer.php",
                method: "POST",
                data: {id: id, column_name: column_name, value: value},
                success: function (data) {
                    $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                    $('#user_data').DataTable().destroy();
                    fetch_data();
                }
            });
            setInterval(function () {
                $('#alert_message').html('');
            }, 5000);
        }

        $(document).on('blur', '.update', function () {
            var id = $(this).data("id");
            var column_name = $(this).data("column");
            var value = $(this).text();
            update_data(id, column_name, value);
        });

        $('#add').click(function () {
            var html = '<tr>';
            html += '<td contenteditable id="data1"></td>';
            html += '<td contenteditable id="data2"></td>';
            html += '<td contenteditable id="data3"></td>';
            html += '<td contenteditable id="data4"></td>';
            html += '<td contenteditable id="data5"></td>';
            html += '<td contenteditable id="data6"></td>';
            html += '<td contenteditable id="data7"></td>';
            html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
            html += '</tr>';
            $('#user_data tbody').prepend(html);
        });

        $(document).on('click', '#insert', function () {
            var fname = $('#data1').text();
            var surname = $('#data2').text();
            var mail = $('#data3').text();
            var gender = $('#data4').text();
            var phone = $('#data5').text();
            var birthday = $('#data6').text();
            var membership = $('#data7').text();
            if (fname !== '' && surname !== '' && mail !== '' && gender !== '' && phone !== '' && birthday !== '' && membership !== '') {
                $.ajax({
                    url: "customerAdd.php",
                    method: "POST",
                    data: {
                        fname: fname,
                        surname: surname,
                        mail: mail,
                        gender: gender,
                        phone: phone,
                        birthday: birthday,
                        membership: membership
                    },
                    success: function (data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function () {
                    $('#alert_message').html('');
                }, 5000);
            } else {
                alert("Both Fields is required");
            }
        });

        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to remove?")) {
                $.ajax({
                    url: "deleteCustomer.php",
                    method: "POST",
                    data: {id: id},
                    success: function (data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function () {
                    $('#alert_message').html('');
                }, 5000);
            }
        });
    });
</script>