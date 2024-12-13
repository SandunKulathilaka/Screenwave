<?php
session_start();
// echo $_SESSION['firstName'];
// echo $_SESSION['email'];

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'screenwave');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <!--Boostrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>CinemaPlex</title>
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
                <a href="signin.php">
                <button id="login" class="btn button">Login</button>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
<div class="slide-show">
    <div class="cover-text">
        <h1 id="movieName" class="btn button"></h1>
        <h2 class="btn button">Now Showing</h2>
        <h3 id="rank" class="btn button"></h3>
        <button class="btn button">Buy Tickets</button>
    </div>
    <img id="image" class="image-slider"src="" alt="" width="100%" height="100%">

</div>
<div class="now-showing">
    <div class="section1">
        <button id="nowShowing" class="btn button" onclick="showNowShowing()">Now Showing</button>
        <button id="upcoming" class="btn button" onclick="showUpcoming()">Upcoming</button>
    </div>
    <div class="section2">
        <?php
        $query1 = "SELECT * FROM movies WHERE state='Now Showing'";
        $results1 = mysqli_query($db, $query1);
        while ($row = mysqli_fetch_assoc($results1)) { ?>
        <div class="item-now">
        <a href="movie.php?edit=<?php echo $row["movieID"]; ?>" >
            <img src="img/wallpaperflare.com_wallpaper.jpg" alt="" width="280px" height="350px">
            <h3><?php echo $row['movieName'] ?></h3>
            <p><?php echo $row['rank'] ?> &nbsp <?php echo $row['releseDate'] ?></p>
            <div class="buttons">
            <a href="<?php echo $row['trailer'] ?>" class="btn btn-warning">Trailer</a>
            <a href="booking.php?edit=<?php echo $row["movieID"]; ?>" class="btn btn-danger">Book Now</a>
            </div>
            </a>
        </div>
        <?php } ?>
        
<!--        Upcoming-->
<?php
        $query2 = "SELECT * FROM movies WHERE state='UpComming'";
        $results2 = mysqli_query($db, $query2);
        while ($row = mysqli_fetch_assoc($results2)) { ?>
        <div class="item-later">
        <a href="movie.php?edit=<?php echo $row["movieID"]; ?>">
            <img src="img/wallpaperflare.com_wallpaper.jpg" alt="" width="280px" height="350px">
            <h3><?php echo $row['movieName'] ?></h3>
            <p><?php echo $row['rank'] ?> &nbsp <?php echo $row['releseDate'] ?></p>
            <div class="buttons">
                <a href="<?php echo $row['trailer'] ?>" class="btn btn-warning">Trailer</a>
                <a href="movie.php?edit=<?php echo $row["movieID"]; ?>" class="btn btn-danger">More Info</a>
            </div>
            </a>
        </div>
        <?php } ?>
    </div>

    <div class="section3">
        <div class="deal-header"><h2>Exclusive Deals and Offers</h2></div>
        <div class="deal-border" onclick="alertFunction('Banner 1')">
        <div class="deals">
            <div class="left-deal">
                <h1>Buy One Get One Free</h1>
                <h5>Valid till : 2023/10/30</h5>
            </div>
            <div class="right-deal">
                <img src="img/avengers-endgame-superheroes-2ujw4a3pp2gh8xpf.jpg" alt="" width="100%" height="100%">
            </div>
        </div>
        </div>
        <div class="deal-border" onclick="alertFunction('Banner 2')">
            <div class="deals">
                <div class="left-deal">
                    <img src="img/avengers-endgame-superheroes-2ujw4a3pp2gh8xpf.jpg" alt="" width="100%" height="100%">
                </div>
                <div class="right-deal">
                    <h1>Buy One Get One Free</h1>
                    <h5>Valid till : 2023/10/30</h5>
                </div>

            </div>
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
    <script src="js/script.js"></script>
</body>
</html>