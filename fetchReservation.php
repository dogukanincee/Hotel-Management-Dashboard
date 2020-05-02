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
$columns = array('fname', 'roomType', 'from_date', 'to_date','payment','paymentInfo','isRefundable','status');

$query = "SELECT * FROM reservation ";

if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE fname LIKE "%' . $_POST["search"]["value"] . '%" 
 OR roomType LIKE "%' . $_POST["search"]["value"] . '%" 
 OR from_date LIKE "%' . $_POST["search"]["value"] . '%" 
 OR to_date LIKE "%' . $_POST["search"]["value"] . '%" 
 OR payment LIKE "%' . $_POST["search"]["value"] . '%" 
 OR paymentInfo LIKE "%' . $_POST["search"]["value"] . '%" 
 OR isRefundable LIKE "%' . $_POST["search"]["value"] . '%" 
 OR status LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="fname">' . $row["fname"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="roomType">' . $row["roomType"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="from_date">' . $row["from_date"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="to_date">' . $row["to_date"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="payment">' . $row["payment"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="paymentInfo">' . $row["paymentInfo"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="isRefundable">' . $row["isRefundable"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="status">' . $row["status"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["id"] . '">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT * FROM reservation";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => get_all_data($conn),
    "recordsFiltered" => $number_filter_row,
    "data" => $data
);

echo json_encode($output);

?>