<?php
session_start();
include_once 'db.php';
$email = "";
$firstName = "";
$lastName = "";
$nic = "";
$dob = "";
$address = "";
$city = "";
$contact = "";
$gender = "";
$password = "";
$edit_state = false;

// For updating records
if (isset($_POST['update'])) {
    $email = $_POST['email'];
	$firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $password = md5($_POST['password']);
    $contact = $_POST['contact'];
    $user = $_POST['user'];
	mysqli_query($conn, "UPDATE users SET firstName = '$firstname', lastName = '$lastname', contact = '$contact', gender = '$gender', address = '$address', city = '$city', nic = '$nic', dob = '$dob', password ='$password', userType = '$user' WHERE email = '$email'");
	$_SESSION['message'] = "Data Updated Successfully";
	header('location: users.php');
}
// For deleteing records
if (isset($_GET['delete'])) {
	$email = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM users WHERE email='$email'");
	$_SESSION['message'] = "Data Deleted Successfully";
	header('location:users.php');
}
?>