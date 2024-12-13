<?php
include 'db.php';
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
    <br><br>
	<center><h1>User Request Messages</h1></center>

<table class="table table-hover">
<tr>
		<th>Message ID</th>
        <th>User</th>
		<th>Time</th>
        <th>Date</th>
        <th>Message</th>
		<th>Contact</th>
        <th>Status</th>
        <th>Options</th>
        <th></th>
	</tr>
	<?php
	$result = mysqli_query($conn, "SELECT * FROM contact WHERE status='Unread'");

while ($row = mysqli_fetch_assoc($result)) {
	?>
	<tr>
	<td><?php echo $row["messageID"]; ?></td>
	<td><?php echo $row["user"]; ?></td>
	<td><?php echo $row["time"]; ?></td>
    <td><?php echo $row["date"]; ?></td>
    <td><?php echo $row["message"]; ?></td>
	<td><?php echo $row["contact"]; ?></td>
    <td>
    <?php echo $row["status"]; ?>
	<td>
    <button class="btn btn-warning mb-2" type="submit" name="update">Read</button>
    </td>
	</tr>
	<?php
}
	?>
</table>

</body>
</html>


