<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "screenwave";
// Create connection
$conn =  mysqli_connect($servername,$username,$password,"$dbname");
if (!$conn) {

	die("Could Not Connect:" .mysqli_connect_error());
}
?>