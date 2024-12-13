<?php
include 'user_process.php';
if (isset($_GET['edit'])) {
		$email = $_GET['edit'];
		$edit_state = true;

		$record = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$data = mysqli_fetch_array($record);
            $email = $data['email'];
			$firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $nic = $data['nic'];
            $dob = $data['dob'];
			$address = $data['address'];
            $city = $data['city'];
            $contact = $data['contact'];
            $gender = $data['gender'];
            $password = $data['password'];

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
    <form class="row g-3" method="POST" action="user_process.php">
        <div class="col-md-4">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <label for="">First Name</label>
            <input type="text" name="firstName" placeholder="First Name" value="<?php echo $firstName; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Last Name</label>
            <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $lastName; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">NIC</label>
            <input type="text" name="nic" placeholder="NIC" value="<?php echo $nic; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Birthday</label>
            <input type="date" name="dob" placeholder="DOB" value="<?php echo $dob; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Address</label>
            <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">City</label>
            <input type="text" name="city" placeholder="City" value="<?php echo $city; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Contact</label>
            <input type="text" name="contact" placeholder="Contact" value="<?php echo $contact; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Gender</label>
            <br>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
        </div>
        <div class="col-md-4">
            <label for="">User Type</label>
            <br>
            <input type="radio" name="user" value="admin">Admin
            <input type="radio" name="user" value="user">User
        </div>
        <div class="col-md-4">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" class="form-control" required>
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
		<th>Email</th>
		<th>First Name</th>
        <th>Last Name</th>
        <th>NIC</th>
        <th>Birthday</th>
		<th>Address</th>
		<th>Contact</th>
        <th>Gender</th>
        <th>Password</th>
        <th>User Type</th>
        <th>Options</th>
        <th></th>
	</tr>
	<?php
	$result = mysqli_query($conn, "SELECT * FROM users");

while ($row = mysqli_fetch_assoc($result)) {
	?>
	<tr>
	<td><?php echo $row["email"]; ?></td>
	<td><?php echo $row["firstName"]; ?></td>
	<td><?php echo $row["lastName"]; ?></td>
    <td><?php echo $row["nic"]; ?></td>
    <td><?php echo $row["dob"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["contact"]; ?></td>
    <td><?php echo $row["gender"]; ?></td>
    <td><?php echo $row["password"]; ?></td>
    <td><?php echo $row["userType"]; ?></td>
	<td>
        <a href="users.php?edit=<?php echo $row["email"]; ?>" class="btn btn-primary">Edit</a>
    </td>
    <td>
        <a href="user_process.php?delete=<?php echo $row["email"]; ?>" class="btn btn-danger">Delete</a>
    </td>
	</tr>
	<?php
}
	?>
</table>

</body>
</html>


