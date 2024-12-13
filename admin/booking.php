<?php
include 'booking_process.php';
if (isset($_GET['edit'])) {
		$bookingID = $_GET['edit'];
		$edit_state = true;

		$record = mysqli_query($conn, "SELECT * FROM booking WHERE bookingID='$bookingID'");
        $data = mysqli_fetch_array($record);
            $bookingID = $data['bookingID'];
			$selectedSeats = $data['selectedSeats'];
            $totalPrice = $data['totalPrice'];
            $movieID = $data['movieID'];
            $date = $data['date'];
			$time = $data['time'];
            $user = $data['user'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/users.css">
	<title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>

	<?php if (isset($_SESSION['message'])):?>
		<div class="message">
			<?php
			echo "
            <div class='alert alert-primary' role='alert'>
            ".$_SESSION['message']."
            </div>";
			unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
<div class="page heading">
	<h1>User Managemant</h1>
</div>
<div class="form-content" hidden>
    <form class="row g-3" method="POST" action="booking_process.php">
        <div class="col-md-4">
            <input type="hidden" name="bookingID" value="<?php echo $bookingID; ?>">
            <label for="">Selected Seats</label>
            <input type="text" name="selectedSeats" placeholder="Seat" value="<?php echo $selectedSeats; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Total Price</label>
            <input type="text" name="totalPrice" placeholder="Price" value="<?php echo $totalPrice; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Movie ID</label>
            <input type="text" name="movieID" placeholder="ID" value="<?php echo $movieID; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Date</label>
            <input type="date" name="date" placeholder="date" value="<?php echo $date; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Time</label>
            <input type="text" name="time" placeholder="Time" value="<?php echo $time; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">User</label>
            <input type="text" name="user" placeholder="User" value="<?php echo $user; ?>" class="form-control" required>
        </div>

    <?php if ($edit_state == false): ?>
        
    <?php else: ?>
        <button class="btn btn-warning mb-2" type="submit" name="update">Update</button>
        <script>
            var form = document.querySelector(".form-content");
            form.removeAttribute("hidden");
        </script>
    <?php endif ?>
</form>
</div>

<table class="table table-hover">
	<tr>
		<th>Booking ID</th>
        <th>User</th>
		<th>Selected Seats</th>
        <th>Total Price</th>
        <th>Time</th>
        <th>Date</th>
        <th>Options</th>
        <th></th>
	</tr>
	<?php
	$result = mysqli_query($conn, "SELECT * FROM booking");

while ($row = mysqli_fetch_assoc($result)) {
	?>
	<tr>
	<td><?php echo $row["bookingID"]; ?></td>
	<td><?php echo $row["user"]; ?></td>
	<td><?php echo $row["selectedSeats"]; ?></td>
    <td><?php echo $row["totalPrice"]; ?></td>
    <td><?php echo $row["time"]; ?></td>
    <td><?php echo $row["date"]; ?></td>
	<td>
        <a href="booking.php?edit=<?php echo $row["bookingID"]; ?>" class="btn btn-primary">Edit</a>
    </td>
    <td>
        <a href="booking_process.php?delete=<?php echo $row["bookingID"]; ?>" class="btn btn-danger">Delete</a>
    </td>
	</tr>
	<?php
}
	?>
</table>

</body>
</html>


