<?php
session_start();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'screenwave');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['edit'])) {
    $movieID = $_GET['edit'];
$sql = "SELECT * FROM movies WHERE movieId = '$movieID'";

$results = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($results);
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['movieName'] ?></title>
    <link rel="stylesheet" href="css/movie.css">
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
        <h1 id="movieName" class="btn button"><?php echo $row['movieName'] ?></h1>
        <h2 class="btn button"><?php echo $row['state'] ?></h2>
        <h3 id="rank" class="btn button"><?php echo $row['rank'] ?></h3>
        <a href="booking.php?edit=<?php echo $row["movieID"]; ?>" class="btn button">Book Now</a>
    </div>
    <img id="image" class="image-slider"src="" alt="" width="100%" height="100%">

</div>

<div class="movie-info">
    <div class="movie-name"><h1><?php echo $row['movieName'] ?></h1></div>

    <div class="details">
    <div class="more-info">
        <div class="upper">
        <h5>Director : <?php echo $row['director'] ?></h5>
        <h5>Writer : <?php echo $row['writer'] ?> </h5>
        <h5>Release Date : <?php echo $row['releseDate'] ?> </h5>
        <h5>Language : <?php echo $row['median'] ?></h5>
        <h5>Duration : <?php echo $row['duration'] ?> minutes</h5>
        <h5>Genres : <span class="genre">Action</span><span class="genre">Racing</span><span class="genre">Crime</span></h5>
        </div>
        <br>
        <div class="summery">
            <h3><i>Summery</i></h3>
            <p>
                <?php echo $row['about'] ?>
            </p>
        </div>
    </div>
    <div class="top-cast">
        <h4><i>Top Casts</i></h4>
        <div class="cast-info">
            <div class="cast">
                <div class="img">
                    <img src="img/programmer.png" alt="" width="100px" height="100px">
                </div>
                <div class="name">
                    <h5 class="movieChar">Archie Madekwe</h5>
                    <h6 class="realChar">Jann Mardenborough</h6>
                </div>
            </div>

            <div class="cast">
                <div class="img">
                    <img src="img/programmer.png" alt="" width="100px" height="100px">
                </div>
                <div class="name">
                    <h5 class="movieChar">Archie Madekwe</h5>
                    <h6 class="realChar">Jann Mardenborough</h6>
                </div>
            </div>
        </div>
        <div class="cast-info">
            <div class="cast">
                <div class="img">
                    <img src="img/programmer.png" alt="" width="100px" height="100px">
                </div>
                <div class="name">
                    <h5 class="movieChar">Archie Madekwe</h5>
                    <h6 class="realChar">Jann Mardenborough</h6>
                </div>
            </div>

            <div class="cast">
                <div class="img">
                    <img src="img/programmer.png" alt="" width="100px" height="100px">
                </div>
                <div class="name">
                    <h5 class="movieChar">Archie Madekwe</h5>
                    <h6 class="realChar">Jann Mardenborough</h6>
                </div>
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
</body>
</html>

<script>
    let realChar = "<?php echo $row['realChar'] ?>";
    let movChar = "<?php echo $row['movieChar'] ?>";
    let dbGenra = "<?php echo $row['genre'] ?>";
    let realCharClass = document.querySelectorAll('.realChar');
    let movieCharClass = document.querySelectorAll('.movieChar');
    let genraBtn = document.querySelectorAll('.genre');

    setInterval(showSlides, 5000); // Change image every 5 seconds
    function showSlides() {
        let image = document.getElementById("image");
        let rand = Math.floor(Math.random() * 4);
        console.log(rand);

        let images =["img/justice-league.jpg","img/justice-league.jpg","img/justice-league.jpg","img/justice-league.jpg"];
        image.src = images[rand];
    }
    function retrieveData(){
        let realC = realChar.split(",");
        let movieC = movChar.split(",");
        let gen = dbGenra.split(",");
        console.log(gen);

        for(let i = 0;i<4;i++){
            realCharClass[i].innerHTML =realC[i];
            movieCharClass[i].innerHTML =movieC[i];
            genraBtn[i].innerHTML =gen[i];
        }
    }
    showSlides();
    retrieveData();
</script>