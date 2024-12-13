<?php
session_start();
$cookie_name = "user";
$cookie_value = $_SESSION['email'];
if(isset($_COOKIE[$cookie_name])) {


$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "screenwave";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['edit'])) {
    $movieIDs = $_GET['edit'];
}else{
    $movieIDs = "movjus";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Film Seat Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/booking.css">
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
    <div class="show">
    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>N/A</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>
    </ul>
    <div class="screen" style="background-color: #777;
            height: 70px;
            width: 600px;
            margin: 15px 0;
            transform: rotateX(-45deg);
            text-align:center;
            box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);">Screen This Way</div>
    </div>
    
    
    
    
    <div id="seat-map">
        <?php
        // Define the number of rows and seats per row
        $rows = 5;
        $seatsPerRow = 10;

        // Simulated seat availability (you can load this from a database)
        $availableSeats = [
            [1, 1, 1, 1, 0, 1, 1, 1, 0, 0],
            [1, 1, 1, 1, 1, 1, 0, 0, 1, 0],
            [1, 1, 1, 1, 0, 0, 0, 1, 0, 1],
            [1, 1, 0, 1, 1, 1, 1, 1, 0, 0],
            [0, 1, 1, 1, 1, 0, 0, 1, 1, 0],
        ];

        for ($row = 0; $row < $rows; $row++) {
            echo "<div class='rows'>";
            for ($seat = 0; $seat < $seatsPerRow; $seat++) {
                $seatNumber = $seat + 1;
                $isAvailable = $availableSeats[$row][$seat];
                $seatClass = $isAvailable ? 'available' : 'unavailable';

                echo "<div class='seat $seatClass' data-row='$row' data-seat='$seatNumber'>A$row$seatNumber</div>";
            }
            echo "</div>";
        }
        ?>
    </div>
    <div id="booking-details">
        <h2>Booking Details</h2>
        <p>Selected Seats : <span id="selected-seats">None</span></p>
        <p>Total Price: LKR :<span id="total-price">0</span></p> 
    </div>
    <div id="booking-details">
    <form method="post" action="php/bookingProcess.php">
        <input type="hidden" name="selected_seats" id="seat" value="">
        <input type="hidden" name="total_price" id="total" value="">
        <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['email'] ?>">
        <input type="hidden" name="id" id="id" value="">
        <label>Pick a movie:</label>
        <select id="movie" name="movie">
        <?php 
        $sql = "SELECT * FROM movies WHERE state='Now Showing'";
        $result = mysqli_query($conn, $sql);
        $selceted = "selected";
        while ($row = mysqli_fetch_assoc($result)) { ?>
           <option value="<?php echo $row['movieID']; ?> "<?php if($row['movieID'] == $movieIDs){ echo $selceted;}  ?> ><?php echo $row['movieName']; ?></option>
            
        <?php }
        ?>
        </select>
        <select id="time" name="time">
        <option value="10.30">10.30 A.M</option>
        <option value="01.30">01.30 P.M</option>
        <option value="04.30">04.30 P.M</option>
        </select>
      <input type="date" name="date">
        <button type="submit" id="book-button" name="book">Book Tickets</button>
        </div>
    </form>
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
    <script>
        // JavaScript logic to handle seat selection and update hidden fields
        // You can use JavaScript to handle seat selection and calculate the total price.
        // Here's a simple example:


        const seats = document.querySelectorAll('.seat');
        const selectedSeats = [];
        const seatPrice = 1000;

        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                if (!seat.classList.contains('selected')) {
                    seat.classList.add('selected');
                    selectedSeats.push(seat.textContent);
                } else {
                    seat.classList.remove('selected');
                    const index = selectedSeats.indexOf(seat.textContent);
                    if (index > -1) {
                        selectedSeats.splice(index, 1);
                    }
                }

                updateBookingDetails();
            });
        });

        function updateBookingDetails() {
            const selectedSeatsElement = document.getElementById('selected-seats');
            const totalPriceElement = document.getElementById('total-price');
            const seat = document.getElementById('seat');
            const total = document.getElementById('total');
            const id = document.getElementById('id');
            var randomInt = Math.floor(Math.random() * 10000) + 1; 

            seat.value = selectedSeats.join(', ');
            id.value = randomInt;
            total.value = selectedSeats.length * seatPrice
            selectedSeatsElement.textContent = selectedSeats.join(', ');
            totalPriceElement.textContent = selectedSeats.length * seatPrice;
        }

        const bookButton = document.getElementById('book-button');
        bookButton.addEventListener('click', () => {
            alert(`You have booked the following seats: ${selectedSeats.join(', ')}. Total Price: $${selectedSeats.length * seatPrice}`);
        });
    </script>
</body>
</html>
<?php
} else {
    $_SESSION = array();
    // Destroy the session
    session_destroy();
    header("Location: signin.php");
}
?>
