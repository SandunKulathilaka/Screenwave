<?php
// Connect to the database
$host = "localhost";
$username = "root"; 
$password = "1234"; 
$database = "screenwave";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$randomID = uniqid() . random_int(1000, 9999);



if(isset($_POST['book'])){
    
// Get selected seats and total price from the form
$bookingID = $_POST['id'];
$selectedSeats = $_POST['selected_seats'];
$totalPrice = $_POST['total_price'];
$movieID = $_POST['movie'];
$date = $_POST['date'];
$time = $_POST['time'];
$user = $_POST['user'];

$sql = "INSERT INTO booking (bookingID, selectedSeats, totalPrice, movieID, date, time, user) VALUES ('$bookingID','$selectedSeats','$totalPrice', '$movieID', '$date', '$time','$user')";
$result = mysqli_query($mysqli,$sql);
header("Location: /MovieSite/booking.php");


} else {
        // Handle seat reservation error
        echo "Error: Seat reservation failed.";
        header("Location: /MovieSite/booking.php");
    }


$mysqli->close();

?>
