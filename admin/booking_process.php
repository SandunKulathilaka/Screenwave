<?php
session_start();
include_once 'db.php';
$bookingID = "";
$selectedSeats = "";
$totalPrice = "";
$movieID = "";
$date = "";
$time = "";
$user = "";
$edit_state = false;

// For updating records
$randomID = uniqid() . random_int(1000, 9999);



if(isset($_POST['update'])){
    
// Get selected seats and total price from the form
$bookingID = $_POST['bookingID'];
$selectedSeats = $_POST['selectedSeats'];
$totalPrice = $_POST['totalPrice'];
$movieID = $_POST['movieID'];
$date = $_POST['date'];
$time = $_POST['time'];
$user = $_POST['user'];


$result = mysqli_query($conn,"UPDATE `booking` SET `bookingID`='$bookingID',`selectedSeats`='$selectedSeats',`totalPrice`='$totalPrice',`movieID`='$movieID',`date`='$date',`time`='$time',`user`='$user' WHERE `bookingID` ='$bookingID'");
	$_SESSION['message'] = "Data Updated Successfully";
	header('location: booking.php');
}
// For deleteing records
if (isset($_GET['delete'])) {
	$bookingID = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM booking WHERE bookingID='$bookingID'");
	$_SESSION['message'] = "Data Deleted Successfully";
	header('location:booking.php');
}
?>