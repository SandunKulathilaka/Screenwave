<?php
include 'movie_process.php';
if (isset($_GET['edit'])) {
		$movieID = $_GET['edit'];
		$edit_state = true;

		$record = mysqli_query($conn, "SELECT * FROM movies WHERE movieID='$movieID'");
        $data = mysqli_fetch_array($record);
        $movieID = $data['movieID'];
        $moviename = $data['movieName'];
        $genre = $data['genre'];
        $lenguage = $data['median'];
        $duration = $data['duration'];
        $releseDate = $data['releseDate'];
        $director = $data['director'];
        $writer = $data['writer'];
        $state = $data['state'];
        $movChar = $data['movieChar'];
        $realChar = $data['realChar'];
        $rank = $data['rank'];
        $price = $data['price'];
        $about = $data['about'];
        $trailer = $data['trailer'];

	}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/movie.css">
	<title>Movie Management</title>
    <link rel="stylesheet" href="css/movie.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
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
	<h1>Movie Managemant</h1>
</div>
<div class="form-content">
<form class="row g-3 needs-validation" action="movie_process.php" method="post">
                    <div class="col-md-3">
                        <label for="movieID" class="form-label">Movie ID :</label>
                        <input type="text" name="movieID" class="form-control" id="movieID" placeholder="mov + first three letters of the movie" value="<?php echo $movieID; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="movieName" class="form-label">Movie Name :</label>
                        <input type="text" name="movieName" class="form-control" id="movieName" placeholder="Avengers" required value="<?php echo $moviename; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="genre" class="form-label">Genre :</label>
                        <input type="text" name="genre" class="form-control" id="genre" placeholder="Action,Adventure" value="<?php echo $genre; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="lenguage" class="form-label">Lenguage :</label>
                        <input type="text" name="lenguage" class="form-control" id="lenguage" placeholder="English" value="<?php echo $lenguage; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="duration" class="form-label">Duration :</label>
                        <input type="text" name="duration" class="form-control" id="duration" placeholder="125 Minutes" value="<?php echo $duration; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="releseDate" class="form-label">Relese Date</label>
                        <input type="date" name="releseDate" class="form-control" id="releseDate" value="<?php echo $releseDate; ?>">
                    </div>
                    <div class="col-3">
                        <label for="director" class="form-label">Director :</label>
                        <input type="text" name="director" class="form-control" id="nic" placeholder="James Gunn" value="<?php echo $director; ?>">
                    </div>
                    <div class="col-3">
                        <label for="writer" class="form-label">Writer :</label>
                        <input type="text" name="writer" class="form-control" id="writer" placeholder="Steve Machinson" value="<?php echo $writer; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">State :</label>
                        <div class="form-radio-input">

                            <input class="form-check-input" type="radio" name="state" id="male" value="Now Showing">
                            <label class="form-check-label" for="male">
                            Now Showing
                            </label>

                            <input class="form-check-input" type="radio" name="state" id="female" value="UpComming">
                            <label class="form-check-label" for="female">
                            UpComming
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="movChar" class="form-label">Movie Character :</label>
                        <input type="text" name="movChar" class="form-control" id="movChar" placeholder="Jhon Blake, Anna Maria" value="<?php echo $movChar; ?>">
                    </div>
                    <div class="col-4">
                        <label for="realChar" class="form-label">Real Character :</label>
                        <input type="text" name="realChar" class="form-control" id="realChar" placeholder="Jhon Blake, Anna Maria" value="<?php echo $realChar; ?>">
                    </div>
                    <div class="col-3">
                        <label for="charImg" class="form-label">Character Image :</label>
                        <input type="file" name="charImg" class="form-control" id="charImg">
                    </div>
                    <div class="col-3">
                        <label for="movImg" class="form-label">Movie Poster :</label>
                        <input type="file" name="image" class="form-control" id="image" value="" accept=".jpg, .jpeg, .png" >
                    </div>
                    <div class="col-3">
                        <label for="rank" class="form-label">Rank :</label>
                        <input type="text" name="rank" class="form-control" id="rank" placeholder="IMDB 6.8" value="<?php echo $rank; ?>">
                    </div>
                    <div class="col-3">
                        <label for="price" class="form-label">Ticket Price :</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="800" value="<?php echo $price; ?>">
                    </div>
                    <div class="col-6">
                        <label for="about" class="form-label">About :</label>
                        <input type="text" name="about" class="form-control" id="about" value="<?php echo $about; ?>">
                    </div>
                    <div class="col-4">
                        <label for="trailer" class="form-label">Trailer :</label>
                        <input type="text" name="trailer" class="form-control" id="trailer" value="<?php echo $trailer; ?>">
                    </div>
                    <div class="col-2">
                    <?php if ($edit_state == false): ?>
                        <br>
	                    <button class="btn btn-success" type="submit" name="save" >Save</button>
                        <button class="btn btn-danger" type="reset">Reset</button>
                    <?php else: ?>
                        <br>
	                    <button class="btn btn-warning" type="submit" name="update" >Update</button>
                    <?php endif ?>
                    </div>
                </form>
</div>

<table class="table table-hover" width="80%">
    <thead>
    <tr>
        <th>Movie Name</th>
        <th>Genre</th>
        <th>Lenguage</th>
        <th>Duration</th>
        <th>Relese Date</th>
        <th>Director</th>
        <th>Writer</th>
        <th>State</th>
        <th>Price</th>
        <th>Trailer</th>
        <th> </th>
        <th>Options</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM movies");
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row["movieName"]; ?></td>
            <td><?php echo $row["genre"]; ?></td>
            <td><?php echo $row["median"]; ?></td>
            <td><?php echo $row["duration"]; ?></td>
            <td><?php echo $row["releseDate"]; ?></td>
            <td><?php echo $row["director"]; ?></td>
            <td><?php echo $row["writer"]; ?></td>
            <td><?php echo $row["state"]; ?></td>
            <td hidden><?php echo $row["movieChar"]; ?></td>
            <td hidden><?php echo $row["realChar"]; ?></td>
            <td hidden><?php echo $row["charImage"]; ?></td>
            <td hidden><?php echo $row["movieImage"]; ?></td>
            <td hidden><?php echo $row["about"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td><?php echo $row["trailer"]; ?></td>
            <td>
            <button class="btn btn-info show-more-btn">More</button>
            </td>
            <td> 
            <a href="movie.php?edit=<?php echo $row["movieID"]; ?>" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <a href="movie_process.php?delete=<?php echo $row["movieID"]; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>

    </tbody>
</table>


</body>
<script>
    
   document.addEventListener("DOMContentLoaded", function() {
       var showMoreButtons = document.querySelectorAll('.show-more-btn');

       showMoreButtons.forEach(function(button) {
           button.addEventListener('click', function() {
               var row = button.closest('tr');
               var movieChar = row.cells[8].textContent;
               var realChar = row.cells[9].textContent;
               var about = row.cells[12].textContent;
               

               var additionalDetails = `
               Movie Charcter : ${movieChar}
               Real Charcter : ${realChar}
               About : ${about}
               `;

               alert(additionalDetails);
           });
       });
   });

   
</script>

</html>
