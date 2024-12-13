<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Boostrap Link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>SignIn</title>
  <link rel="stylesheet" href="css/signin.css">
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
    <?php if(isset($_SESSION['email'])){ ?>
                <img src="img/user.png" alt="" width="30px" height="30px">
                <a href="dashboard.php" class="btn button"><?php echo $_SESSION['firstName']; ?></a>
                <?php }else { ?>
                <a href="signup.php">
                <button id="register" class="btn button">Register</button>
                </a>
                <?php } ?>
    </div>
  </div>
</div>
<div class="middle-body">
  <div class="left-side">
    <div class="top-part">
      <h1>CinemaPlex</h1>
    </div>
    <div class="bottom-part">
      <p class="left-side-text">Hello there, and welcome back to CinemaPlex!
        🍿 We're absolutely thrilled to see you again. Thank you for choosing us for your cinematic adventures once more.
        Get ready to immerse yourself in the magic of movies all over again.
       </p>
    </div>


  </div>
  <div class="right-side">
    <div class="form-text">

      <h2>LogIn</h2>

    </div>
    <div class="form">

      <form class="row g-3"action="php/server.php" method="post">
        <div class="col-md-9">
          <label for="inputEmail4" class="form-label">User Name :</label>
          <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="jhonblake@gmail.com">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Password :</label>
          <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Ex : 8Ys{u7W8">
        </div>
        <div class="col-12">
          <button class="btn btn-success">Show Password</button>
          <a href="">
            Forgot password?
          </a>
        </div>
        <div class="col-md-6">
          <label for="otp" class="form-label">Enter OTP :</label>
          <input type="password" class="form-control" id="otp" placeholder="Ex : 8Ys{u7W8" disabled>
        </div>

        <div class="col-7">
          <button type="submit" name="login_user" class="btn btn-danger">Sign in</button>
        </div>
      </form>
      <br>
      <a href="signup.html" class="btn btn-warning" >New User Register</a>

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
</div></body>
</html>