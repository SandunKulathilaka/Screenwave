<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About CinemaPlex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
      
@import url(https://fonts.googleapis.com/css?family=Alegreya+Sans:300);
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

body{
    background-image: url('https://img.freepik.com/free-photo/dark-vip-cinema-studio-still-life_23-2149500607.jpg?w=1060&t=st=1698879090~exp=1698879690~hmac=85fce526cf0d9f4c7640625e844e51224a68c605783b633420e2c5a4d5b62f50');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-color: #242333;
    display: flex;
    flex-direction: column;
    color: #fff;
    display: flex;
    height: 100%;
    font-family: "Lato", sans-serif;
    margin: 0;

        }
        .nav{
            position: fixed;
            width: 100%;
            z-index: 1;
            left: 0;
            
        }
        .nav-bar {

            color: white;
            background-color: rgba(0, 0, 0, 0.431);
            height: 9vh;
            width: 100%;
            display: flex;
            position: fixed;
        }

        .nav-bar ul li {
            margin-top: 10px;
            margin-right: 35px;
            font-weight: 700;
            list-style: none;
            background: none;
            font-family: sans-serif;
            font-size: 13px;
            letter-spacing: 1.1px;
            cursor: pointer;
            transition: all .5s ease-out;
        }

        .nav-bar ul li:hover {
            color: rgb(250, 216, 25);
            transform: scale(1.1);
        }

        .logo {
            display: flex;
            margin: auto;
            align-items: center;
            justify-content: flex-start;

        }
        .logo >h5{
            transition: all 1s ease-out;
        }
        .logo >h5:hover{
            color: rgb(250, 216, 25);
            scale: 1.1;
            cursor: pointer;

        }
        ul{
            display: flex;
            margin: auto;
            align-items: center;
            justify-content: center;
            width: 50%;
        }
        .left{
            width: 25%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .logo> img {
            margin-left: 10px;
            margin-right: 5px;
        }
        ul>a{
            text-decoration: none;
        }
        .btn.button {
            color: white;
            backdrop-filter: blur(30px);
            letter-spacing: 2px;
            margin: 15px 15px 15px 10px;
            padding: 5px;
            border: 2px solid rgb(245, 229, 9);
            transition: 1s ease;
        }  
        .button:hover{
            background:rgb(255, 239, 9) ;
            color:black;
        }

        .line{
            border: 3px solid rgba(255, 255, 255, 0.45);
            margin: 10px;
            width: 0px;
        }


        .header {
            margin-top: 9vh;
            padding: 10px;
            text-align: center;
        }

        .container1 {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        .about-heading {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .highlight {
            color: #ff6600;
            font-weight: bold;
        }

        .locations {
            margin-top: 20px;
        }

        .locations h3 {
            font-size: 24px;
        }

        .contact-info {
            margin-top: 20px;
        }

        .contact-info p {
            font-size: 18px;
        }
        .footer-dark {
    padding:50px 0;
    color:#f0f9ff;
    background-color: black;}

.footer-dark h3 {
    margin-top:0;
    margin-bottom:12px;
    font-weight:bold;
    font-size:16px;
}


.footer-dark a {
    color:inherit;
    text-decoration:none;
    opacity:0.6;
}

.footer-dark a:hover {
    opacity:0.8;
    color: rgb(245, 229, 9);
}

@media (max-width:767px) {
    .footer-dark .item:not(.social) {
        text-align:center;
        padding-bottom:20px;
    }
}

.footer-dark .item.text {
    margin-bottom:36px;
}

@media (max-width:767px) {
    .footer-dark .item.text {
        margin-bottom:0;
    }
}

.footer-dark .item.text p {
    opacity:0.6;
    margin-bottom:0;
}

.footer-dark .item.social {
    text-align:center;
}

@media (max-width:991px) {
    .footer-dark .item.social {
        text-align:center;
        margin-top:20px;
    }
}

.footer-dark .item.social > a {
    font-size:20px;
    width:36px;
    height:36px;
    line-height:36px;
    display:inline-block;
    text-align:center;
    border-radius:50%;
    box-shadow:0 0 0 1px rgba(255,255,255,0.4);
    margin:0 8px;
    color:#fff;
    opacity:0.75;
}

.footer-dark .item.social > a:hover {
    opacity:0.9;
}

.footer-dark .copyright {
    text-align:center;
    padding-top:24px;
    opacity:0.3;
    font-size:13px;
    margin-bottom:0;
}
    </style>
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
    <div class="header">
        <h1>Welcome to CinemaPlex</h1>
    </div>
    <div class="container1">
        <div class="about-content">
            <div class="about-heading">
                About CinemaPlex
            </div>
            <p>
                At <span class="highlight">CinemaPlex</span>, we believe that every movie-going experience should be seamless, enjoyable, and as magical as the movies themselves...
                <!-- Rest of the content here -->
            </p>

            <div class="locations">
                <h3>Our Locations:</h3>
                <p>CinemaPlex is your local cinema companion in <span class="highlight">Colombo</span>, <span class="highlight">Kiribathgoda</span>, and <span class="highlight">Gampaha</span>...</p>
            </div>

            <div class="contact-info">
                <h3>Get in Touch:</h3>
                <p>
                    We value your feedback and suggestions. Feel free to reach out to our dedicated customer support team, available 24/7, to assist you with any queries or concerns.
                </p>
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
