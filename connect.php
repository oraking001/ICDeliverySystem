<?php
//modify your connections here
$servername = "localhost";
// $username = "finzuser";
// $password = "finzuser@91";
$username = "root";
$password = "root";
$dbname = "vectotqv_finz";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
function get_user_by_id($user_id)
{
	global $conn;
	$sel="select * from tbl_login where sa_id='$user_id'";
	$run=mysqli_query($conn,$sel);
	$row=mysqli_fetch_assoc($run);
	return $row;
}
?>