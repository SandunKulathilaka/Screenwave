<?php
session_start();
$cookie_name = "user";
$cookie_value = $_SESSION['email'];
if(isset($_COOKIE[$cookie_name])) {
    

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

$db = mysqli_connect('localhost', 'root', '', 'screenwave');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

if(isset($_POST['update_user'])){
	$firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $password = md5($_POST['password']);
    $contact = $_POST['contact'];
	mysqli_query($db, "UPDATE users SET firstName = '$firstname', lastName = '$lastname', contact = '$contact', gender = '$gender', address = '$address', city = '$city', nic = '$nic', dob = '$dob', password ='$password' WHERE email = '$email'");
	header("Location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <!--Boostrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

<div class="nav">
        <div class="nav-bar">
            <div class="logo">
                <img src="img/movie-icon-15152.gif" alt="logo" width="auto" height="70px">
                <h5>CinemaPlex</h5>
            </div>
            <ul>
            <a href="index.php"><li>HOME</li></a>
                <a href="movies.php"><li>MOVIES</li></a>
                <a href="booking.php"><li>BOOKING</li></a>
                <a href="about.php"><li>ABOUT US</li></a>
                <a href="contactus.php"><li>Contact US</li></a>
            </ul>
            <div class="left">
                <img src="img/user.png" alt="" width="30px" height="30px">
                <a href="logout.php" class="btn button">LogOut</a>
                <a href="signin.php">
                <button id="login" class="btn button" <?php echo $_SESSION['state']; ?>>Login</button>
                </a>
            </div>
        </div>
    </div>
<div class="main-body">
<div class="left-side">
    <h1>Personal Informations</h1>


<div class="table">    
<table class="table" width="50%" height="70%">
    <?php 
    $db = mysqli_connect('localhost', 'root', '1234', 'screenwave');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM users WHERE email= '$email'";
    $record = mysqli_query($db,$sql);
    $row =  mysqli_fetch_assoc($record);
    ?>
    <tr>
        <th>Email :</th>
        <th><?php echo  $row['email']; ?></th>
    </tr>
    <tr>
        <th>First Name :</th>
        <th><?php echo $row['firstName']; ?></th>
    </tr>
    <tr>
        <th>Last Name :</th>
        <th><?php echo $row['lastName']; ?></th>
    </tr>
    <tr>
        <th>Contact Number :</th>
        <th><?php echo $row['contact']; ?></th>
    </tr>
    <tr>
        <th>Gender :</th>
        <th><?php echo $row['gender']; ?></th>
    </tr>
    <tr>
        <th>Address :</th>
        <th><?php echo $row['address']; ?></th>
    </tr>
    <tr>
        <th>City :</th>
        <th><?php echo  $row['city']; ?></th>
    </tr>
    <tr>
        <th>NIC No :</th>
        <th><?php echo $row['nic']; ?></th>
    </tr>
    <tr>
        <th>Birthday :</th>
        <th><?php echo $row['dob']; ?></th>
    </tr>
</table>
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">
  Edit User
</button>
<?php if($_SESSION['userType'] == "admin" ) {?>
    <a class="btn btn-danger" href="/MovieSite/admin" >Admin Panel</a>
<?php } ?>  
</div>
    <!-- Update Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form class="row g-3" method="POST" action="dashboard.php">
        <div class="col-md-4">
            <input type="hidden" name="email" value="<?php echo  $row['email']; ?>">
            <label for="" class="modal-title fs-5">First Name</label>
            <input type="text" name="firstName" placeholder="First Name" value="<?php echo $row['firstName']; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Last Name</label>
            <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $row['lastName']; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">NIC</label>
            <input type="text" name="nic" placeholder="NIC" value="<?php echo $row['nic']; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Birthday</label>
            <input type="date" name="dob" placeholder="DOB" value="<?php echo $row['dob']; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Address</label>
            <input type="text" name="address" placeholder="Address" value="<?php echo $row['address']; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">City</label>
            <input type="text" name="city" placeholder="City" value="<?php echo $row['city']; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Contact</label>
            <input type="text" name="contact" placeholder="Contact" value="<?php echo $row['contact']; ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="">Gender</label>
            <br>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
        </div>
        <div class="col-md-4">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password" value="" class="form-control" required>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="update_user" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<div class="right-side">


<h1>Booking Informations</h1>

<div class="table">    
<table class="table" width="50%" height="70%">
    <?php 
    
    $sql1 = "SELECT * FROM booking WHERE user= '$email'";
    $record1 = mysqli_query($db,$sql1);
    while($row1 =  mysqli_fetch_assoc($record1)){
    ?>
    <tr>
        <th>User :</th>
        <th><?php echo  $row1['user']; ?></th>
    </tr>
    <tr>
        <th>Booking ID :</th>
        <th><?php echo $row1['bookingID']; ?></th>
    </tr>
    <tr>
        <th>Movie ID :</th>
        <th><?php echo $row1['movieID']; ?></th>
    </tr>
    <tr>
        <th>Selected Seats :</th>
        <th><?php echo $row1['selectedSeats']; ?></th>
    </tr>
    <tr>
        <th>Date :</th>
        <th><?php echo $row1['date']; ?></th>
    </tr>
    <tr>
        <th>Time :</th>
        <th><?php echo $row1['time']; ?></th>
    </tr>
    <tr>
        <th>Total Price :</th>
        <th><?php echo  $row1['totalPrice']; ?></th>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
  <?php } ?> 
</table>
</div>

</div>
</div>



    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>

                            <a href="#">Web design</a><br>
                            <a href="#">Development</a><br>
                            <a href="#">Hosting</a>

                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                            <a href="#">Company</a><br>
                            <a href="#">Team</a><br>
                            <a href="#">Careers</a>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>CinemaPlex</h3>
                        <p>Hello and welcome to CinemaPlex !
                            Get ready for an incredible movie experience where every visit promises great films and good times. Sit back, relax, and enjoy the show! </p>
                    </div>
                    <div class="col item social"><a href="#"><i class="bi bi-facebook"></i></a><a href="#"><i class="bi bi-instagram"></i></a><a href="#"><i class="bi bi-youtube"></i></a></div>
                </div>
                <p class="copyright">CinemaPlex © 2023</p>
            </div>
        </footer>
    </div>


    
<?php }else{
    header("Location: signin.php");
}
} else {
    header("Location: signin.php");
}
?>
</body>
</html>

